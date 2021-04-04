<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
require_once( APIF_INST_PATH . 'libs/InstagramScraper.php' );
// require_once( APIF_INST_PATH . 'libs/InstagramScraper.php' );
require_once( APIF_INST_PATH . 'libs/phpFastCache.php' );
require_once( APIF_INST_PATH . 'libs/Unirest.php' );
// namespace InstagramScraper;

use InstagramScraper\Instagram;
use InstagramScraper\Model\Media;
use InstagramScraper\Model\Comment;
// use InstagramScraper\Exception\InstagramNotFoundException;
// use InstagramScraper\Exception\InstagramException;
use InstagramScraper\Exception\InstagramAuthException;
use InstagramScraper\Exception\InstagramException;
use InstagramScraper\Exception\InstagramNotFoundException;
use Unirest\Request;

if ( ! class_exists( 'APIFPRO_MediaUsers' ) ) :

class APIFPRO_MediaUsers {

  var $count = APIF_Instagram_Total_Count;
  /** @var  Exclude words */
  private $filterByWords;
  /** @var  Include words */
  private $include;
  private $size;
  private $url;
  private $image_cache;
  private $new_images = array();
  private $accounts = [];
  private $comments = null;
    /**
     * Constructor
     */
   public function __construct() {
    
   }


    public function getCount(){
        return $this->count;
    }

  public static function preparePrefixContent($content, $prefix){
    if (strpos($content, $prefix) === 0){
      return str_replace($prefix, '', $content);
    }
    return $content;
  }

   public function get_feeds_by_type($feed_type,$access_token,$content){   
    $result = array(); 
   // $getCount =  $this->getCount();
    $instagram = $GLOBALS['insta_api'];
    $getCount =  APIF_Instagram_Total_Count;
    $this->url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$access_token}&count={$getCount}";
    $instagram->setUserAgent("Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36");
/*    echo $feed_type;
    echo $content;
    exit();*/
   
    switch ($feed_type) {
      case 'any_user_timeline':
        //$this->url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$access_token}&count={$getCount}";
        $medias = [];
        $forced_loading_of_post = false;
        //content as username
        $content = $this->preparePrefixContent($content, '@');
        $account = $this->getAccount($content);
        $userMeta = $this->fillUser($content);
        $account_id = $account->getId();
        $medias = $instagram->getMediasByUserId($account_id, $getCount);
        break;

        case 'hashtag':
         //content as hashtag
        $tag = $this->preparePrefixContent($content, '#');
        $this->url = $tag;//"https://api.instagram.com/v1/tags/{$tag}/media/recent?access_token={$accessToken}&count={$this->getCount()}";
        $medias = $instagram->getMediasByTag($this->url, $getCount);
        $forced_loading_of_post = true;

        break;
      
      default:
        # code...
        break;
    }
/*   echo "<pre>";
    print_r($medias);
    exit();*/
    foreach ( $medias as $media ) {
      try {
      $media_link =  $media['link'];
      $mediaimg =  $media['img'];
      $thumbnailResources =  $media['thumbnailResources'];
      $post      = $instagram->getMediaByUrl( $media_link );
      $post      = $this->altParsePost($post, $forced_loading_of_post);
      if(!empty($userMeta)){
            $post->userMeta = $userMeta;
     }
      if(!empty($thumbnailResources)){
            $post->thumbnailResources = $thumbnailResources;
     }
     $result[$post->id] = $post;
     //if ($this->isSuitablePost($post)) $result[$post->id] = $post;
     } catch ( InstagramNotFoundException $e ) {
        }
     }
   /* $this->displayArr($result);
     exit();*/
     return $result;
   }

    /**
     * @param string $username
     *
     * @return \InstagramScraper\Model\Account
     */
    public function getAccount($username){
        // echo $username;
        if (!array_key_exists($username, $this->accounts)){
            //$i = new Instagram();
            $i = $GLOBALS['insta_api'];
            try {
                $this->accounts[$username] = $i->getAccount($username);
            } catch ( InstagramNotFoundException $e ) {
                //throw new LASocialException('Username not found', array(), $e);
                error_log($e->getMessage());
            }
        }
        return $this->accounts[$username];
    }

    public function fillUser($username){
            $account = $this->getAccount($username);
            $result = new \stdClass();
            $result->username = $account->getUsername();
            $result->full_name = $account->getFullName();
            $result->id = $account->getId();
            $result->bio = $account->getBiography();
            $result->website = $account->getExternalUrl();
            $result->counts = new \stdClass();
            $result->counts->media = $account->getMediaCount();
            $result->counts->follows = $account->getFollowsCount();
            $result->counts->followed_by = $account->getFollowedByCount();
            $result->profile_picture = $account->getProfilePicUrlHd();
        return $result;
    }

    /**
     * @param Media $post
     *
     * @return \stdClass
     */
    public function altParsePost($post, $forced_loading_of_post = false) {
        $account = $post->getOwner();
        $post_link = $post->getLink();
        $media_type = $post->getType();
        $postid = $post->getId();
        $caption = $post->getCaption();
        $instagram_post_feeds = new \stdClass();
        $instagram_post_feeds->id = $postid;
        $instagram_post_feeds->type ='instagram';
        $instagram_post_feeds->media_type = $media_type;
        $instagram_post_feeds->header = '';
        $instagram_post_feeds->nickname = $account->getUsername();
        $instagram_post_feeds->screenname = $this->removeEmoji($account->getFullName());
        $instagram_post_feeds->userpic = $account->getProfilePicUrlHd();
        $instagram_post_feeds->system_timestamp = $post->getCreatedTime();
        $instagram_post_feeds->carousel = [];

        $min_thumbnail = 1000;
        $max_thumbnail = 0;
        foreach ( $post->getThumbnailResources() as $width => $thumbnail ) {
            if ($min_thumbnail > $width && $width >= 200) $min_thumbnail = $width;
            if ($max_thumbnail < $width && $width <= 1000) $max_thumbnail = $width;
        }
        $min_thumbnail = $post->getThumbnailResources()[$min_thumbnail];
        $max_thumbnail = $post->getThumbnailResources()[$max_thumbnail];
       // $instagram_post_feeds->img = array('url' => $min_thumbnail->url, 'width' => $min_thumbnail->width, 'height' =>$min_thumbnail->height);
        $instagram_post_feeds->img = $this->createImage($min_thumbnail->url, $min_thumbnail->width, $min_thumbnail->height);
        //media type check
        switch ($media_type) {
               case 'video':
                $instagram_post_feeds->media = $this->createMedia($post->getVideoStandardResolutionUrl(), $max_thumbnail->width, $max_thumbnail->height, 'video/mp4', true);
                break;
                  case 'sidecar':
                  $getSidecarMedias = $post->getSidecarMedias();
                  if(!empty($getSidecarMedias )){
                     foreach ($post->getSidecarMedias()  as $item ) {
                        $width = max(array_keys($item->getThumbnailResources()));
                        $max_thumbnail = $item->getThumbnailResources()[$width];
                        $instagram_post_feeds->carousel[] = $this->createMedia($max_thumbnail->url, $max_thumbnail->width, $max_thumbnail->height,  'image'== $item->getType() ? 'image' : 'video/mp4', true);
                    }
                    $instagram_post_feeds->media = $instagram_post_feeds->carousel[0];
                  }
                # code...
                break;
                  case 'carousel':
                   $getCarouselMedia = $post->getCarouselMedia();
                  if(!empty($getCarouselMedia)){
                    foreach ($post->getCarouselMedia()  as $item ) {
                        $width = max(array_keys($item->getThumbnailResources()));
                        $max_thumbnail = $item->getThumbnailResources()[$width];
                        $instagram_post_feeds->carousel[] = $this->createMedia($max_thumbnail->url, $max_thumbnail->width, $max_thumbnail->height,  'image'== $item->getType() ?  'image': 'video/mp4', true);
                    }
                    $instagram_post_feeds->media = $instagram_post_feeds->carousel[0];
                  }
                # code...
                break;
            
            default:
               $instagram_post_feeds->media = $this->createMedia($max_thumbnail->url, $max_thumbnail->width, $max_thumbnail->height, 'image', true);
               break;
        }
    
        $instagram_post_feeds->description = $this->getCaption($caption);
        $instagram_post_feeds->profile_link = 'http://instagram.com/' . $instagram_post_feeds->nickname;
        $instagram_post_feeds->permalink = $post_link;
        $getLocation = $post->getLocation();
        if (!empty($getLocation)) $instagram_post_feeds->location = (object)$getLocation;
        $instagram_post_feeds->additional = array('likes' => (string)$post->getLikesCount(), 'comments' => (string)$post->getCommentsCount());

        return $instagram_post_feeds;
    }

     public function getCaption($text){
        $text = $this->removeEmoji( (string) $text );
        return $this->hashtagLinks($text);
    }

    public function hashtagLinks($text) {
        $result = preg_replace('~(\#)([^\s!,. /()"\'?]+)~', '<a href="https://www.instagram.com/explore/tags/$2">#$2</a>', $text);
        return $result;
    }

    /**
     * @param stdClass $post
     * @return bool
     */
    public function isSuitablePost($post){
        if ($post == null) return false;
        $suitable = $this->includePost($post);
        if($suitable){
            $suitable = $this->excludePost($post);
        }

        return $suitable;
    }

        public function includePost($post)
    {
     //   if(isset($this->include) && !empty($this->include)){
        if(isset($this->include) && count($this->include) == 0) return true;

        foreach ( $this->include as $word ) {
            $word = mb_strtolower($word);
            $firstLetter = mb_substr($word, 0, 1);

            if ($firstLetter !== false){
                switch ($firstLetter) {
                    case '@':
                        $word = mb_substr($word, 1);
                        if ((mb_strpos(mb_strtolower($post->screenname), $word) !== false) || (mb_strpos(mb_strtolower($post->nickname), $word) !== false)) {
                            return true;
                        }
                        break;
                    case '#':
                        $word = mb_substr($word, 1);
                        if (mb_strpos(mb_strtolower($post->permalink), $word) !== false) {
                            return true;
                        }
                        break;
                    default:
                        if (!empty($word) && ((mb_strpos(mb_strtolower($post->text), $word) !== false) || (isset($post->header) && mb_strpos(mb_strtolower($post->header), $word) !== false))) {
                            return true;
                        }
                        break;
                }
            }
       // }
      }

        return false;
    }

    public function excludePost($post)
    {
        if(count($this->filterByWords) == 0) return true;

        foreach ( $this->filterByWords as $word ) {
            $word = mb_strtolower($word);
            $firstLetter = mb_substr($word, 0, 1);
            if ($firstLetter !== false){
                switch ($firstLetter) {
                    case '@':
                        $word = mb_substr($word, 1);
                        if ((mb_strpos(mb_strtolower($post->screenname), $word) !== false) || (mb_strpos(mb_strtolower($post->nickname), $word) !== false)) {
                            return false;
                        }
                        break;
                    case '#':
                        $word = mb_substr($word, 1);
                        if (mb_strpos(mb_strtolower($post->permalink), $word) !== false) {
                            return false;
                        }
                        break;
                    default:
                        if (!empty($word) && ((mb_strpos(mb_strtolower($post->text), $word) !== false) || (isset($post->header) && mb_strpos(mb_strtolower($post->header), $word) !== false))) {
                            return false;
                        }
                }
            }
        }

        return true;
    }

        /**
     * @param string $text
     * @return mixed
     */
    public function removeEmoji($text) {
        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $clean_text = preg_replace($regexEmoticons, '', $text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $clean_text = preg_replace($regexMisc, '', $clean_text);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        return $clean_text;
    }

   /**
     * @param $url
     * @param $width
     * @param $height
     * @param bool $scale
     *
     * @return array
     */
    public function createImage($url, $width = null, $height = null, $scale = true){
        if ($width != -1 && $height != -1) {
            if ($width == null || $height == null){
                $size = $this->size($url);
                $width = $size['width'];
                $height = $size['height'];
            }
            if ($scale){
                $tWidth = '300';
                return array('url' => $url, 'width' => $tWidth, 'height' =>$this->getScaleHeight($tWidth, $width, $height));
            }
        }
        return array('url' => $url, 'width' => $width, 'height' => $height);
    }

  public function createMedia($url, $width = null, $height = null, $type = 'image', $scale = false){
        if ($type == 'html'){
            return array('type' => $type, 'html' => $url);
        }
        if ($width == null || $height == null){
            $size = $this->size($url);
            $width = $size['width'];
            $height = $size['height'];
        }
        if ($type == 'image' && $scale == true && $width > 600){
            $height = $this->getScaleHeight(600, $width, $height);
            $width = 600;
        }
        return array('type' => $type, 'url' => $url, 'width' => $width, 'height' => $height);
    }

  public function size($url, $original_url = ''){
        $h = hash('md5', $url);
        if ($original_url != '') $url = $original_url;
        if (!array_key_exists($h, $this->image_cache)){
            try{
                $time = date("Y-m-d H:i:s", time());
                if ($url && !empty($url)) {
                    if (isset($_REQUEST['debug'])){
                        ini_set('upload_max_filesize', '16M');
                        ini_set('post_max_size', '16M');
                        ini_set('max_input_time', '60');
                    }
                    @list($width, $height) = getimagesize($url);
                    if (empty($width) || empty($height)){
                        @list($width, $height) = $this->alternativeGetImageSize($url);
                        if (empty($width) || empty($height)){
                            $width  = -1;
                            $height = -1;
                        }
                    }
                    $data = array('creation_time' => $time, 'width' => $width, 'height' => $height, 'original_url' => $original_url);
                } else $data = array('creation_time' => $time, 'width' => -1, 'height' => -1, 'original_url' => $original_url);
                if ($data['width'] > 0 && $data['height'] > 0){
                    $this->image_cache[$h] = $data;
                    $this->new_images[$h] = $data;
                }
                return $data;
            } catch (\Exception $e) {
                error_log($url);
                error_log($e->getMessage());
                error_log($e->getTraceAsString());
                return array('time' => time(), 'width' => -1, 'height' => -1, 'error' => $e->getMessage());
            }
        }
        return $this->image_cache[$h];
    }

   public function alternativeGetImageSize($url){
        $raw = $this->ranger($url);
        if ($raw === 'URL signature expired'){
            return array(-1, -1);
        }
        $im = imagecreatefromstring($raw);
        $width = imagesx($im);
        $height = imagesy($im);
        imagedestroy($im);
        return array($width, $height);
    }

    public function ranger($url){
        $headers = array(
            "Range: bytes=0-32768"
        );

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 5000);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }


    /**
     * @param int $templateWidth
     * @param int $originalWidth
     * @param int $originalHeight
     * @return int|string
     */
    public function getScaleHeight($templateWidth, $originalWidth, $originalHeight){
        if (isset($originalWidth) && isset($originalHeight) && !empty($originalWidth)){
            $k = $templateWidth / $originalWidth;
            return (int)round( $originalHeight * $k );
        }
        return '';
    }


   public function save_feeds($post_id,$feeds,$actiontype){
    global $wpdb;
    $new_feed_arr = array();
    $feeds_arr = array();
  
    if(isset($feeds) && !empty($feeds)):
        $i = 1;
        foreach ($feeds as $key => $post) {

          if($actiontype == "add"){
             $feed_id = $post->id;
             $system_timestamp = isset($post->system_timestamp) ? $post->system_timestamp : '';
             $post_text = str_replace("\r\n", "<br>", $post->description);
             $post_text = str_replace("\n", "<br>", $post_text);
             $post_text = trim($post_text);
             $thumbnailResources = isset($post->thumbnailResources) ? $post->thumbnailResources : array();
             $extra_options =  array('thumbnailResources' => $thumbnailResources );
             $extra_options = serialize($extra_options);
             $media_type = isset($post->media_type) ? $post->media_type : '';
             $header = isset($post->header) ? $post->header : '';
             $nickname = isset($post->nickname) ? $post->nickname : '';
             $screenname = isset($post->screenname) ? $post->screenname : '';
             $userpic = isset($post->userpic) ? $post->userpic : '';
             $img = isset($post->img) ? serialize($post->img) : ''; 
             $carousel = isset($post->carousel) ? serialize($post->carousel) : '';
             $media = isset($post->media) ? serialize($post->media) : '';
             $posttype = isset($post->type) ? $post->type : '';
             $profile_link = isset($post->profile_link) ? $post->profile_link : '';
             $permalink = isset($post->permalink) ? $post->permalink : '';
             $additional = isset($post->additional) ? serialize($post->additional) : '';
             $userMeta = isset($post->userMeta) ? serialize($post->userMeta) : '';
             $location = isset($post->location) ? serialize($post->location) : ''; 
          }else{
             $feed_id = $post['id'];
             $system_timestamp = isset($post['system_timestamp']) ? $post['system_timestamp'] : '';
             $description = isset($post['description']) ? $post['description'] : '';
             $post_text = str_replace("\r\n", "<br>", $description);
             $post_text = str_replace("\n", "<br>", $post_text);
             $post_text = trim($post_text);
             $media_type = isset($post['media_type']) ? $post['media_type'] : '';
             $header = isset($post['header']) ? $post['header'] : '';
             $nickname = isset($post['nickname']) ? $post['nickname'] : '';
             $screenname = isset($post['screenname']) ? $post['screenname'] : '';
             $userpic = isset($post['userpic']) ? $post['userpic'] : '';
             $img = isset($post['img']) ? serialize($post['img']) : ''; 
             $carousel = isset($post['carousel']) ? serialize($post['carousel']) : '';
             $media = isset($post['media']) ? serialize($post['media']) : '';
             $posttype = isset($post['type']) ? $post['type'] : '';
             $thumbnailResources = isset($post['thumbnailResources']) ? $post['thumbnailResources'] : array();
             $extra_options =  array('thumbnailResources' => $thumbnailResources );
             $extra_options = serialize($extra_options);
             $profile_link = isset($post['profile_link']) ? $post['profile_link'] : '';
             $permalink = isset($post['permalink']) ? $post['permalink'] : '';
             $additional = isset($post['additional']) ? serialize($post['additional']) : '';
             $userMeta = isset($post['userMeta']) ? serialize($post['userMeta']) : '';
             $location = isset($post['location']) ? serialize($post['location']) : ''; 
          }
         $feeds_arr[] = array(
          'feed_id' => $feed_id,
          'post_id' => $post_id,
          'type' => $posttype,
          'media_type' => $media_type,
          'header' => $header,
          'system_timestamp' => $this->correctTimeZone($system_timestamp),
          'nickname' =>$nickname,
          'screenname' => $screenname,
          'userpic' => $userpic,
          'carousel' => $carousel, 
          'img' => $img, 
          'media' =>  $media, 
          'profile_link' => $profile_link,
          'permalink' => $permalink,
          'description' => $post_text,
          'additional' =>  $additional, 
          'userMeta' => $userMeta, //user_biography , counts, website, fullname
          'extra_options' => $extra_options,
          'location' => $location,
          'order' => $i,
          'post_status' => 'approved',
          'date' => date( 'Y-m-d H:i:s:u' ),
          );
       $i++; }
      endif;
     // $this->displayArr($feeds_arr);
          if(!empty($feeds_arr)){
             foreach ($feeds_arr as $key => $post_arr) {

                 $feed_id = $post_arr['feed_id'];
                 $post_id = $post_arr['post_id'];
                 if($actiontype == "add"){
                      $wpdb->insert( APIF_Instagram_Feeds_Table, $post_arr); 
                }else if($actiontype == "cache_reset"){
                     $exist_feed_ids = $this->get_feeds_by_postid($post_id);
                     if(!in_array($feed_id , array_column($exist_feed_ids, 'feed_id'))) { // search value in the array
                        $new_feed_arr = $post_arr;
                        $wpdb->insert( APIF_Instagram_Feeds_Table, $new_feed_arr); 
                      }
                }else if($actiontype == "copy"){
                       $wpdb->insert( APIF_Instagram_Feeds_Table, $post_arr); 
                }

              }
          }

      if(isset($wpdb->last_error) && $wpdb->last_error !=''){
             $error_msg = $wpdb->last_error;
             return false;
        }else{
             $error_msg = "No changes made.";
             return true;
        }
   }

   public function get_feeds_by_postid($postid){
        global $wpdb;
        
        $table_name = APIF_Instagram_Feeds_Table;
        $feeds_posts_arr = $wpdb->get_results("SELECT * FROM $table_name where post_id = $postid");  
        include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
        $insta = new InstaWCD();
        $feeds_posts_arr = $insta->objectToArray($feeds_posts_arr); 
        return $feeds_posts_arr;  
   }

    public function get_post_feeds($postid){
        global $wpdb;
        $table_name = APIF_Instagram_Posts_Table;
        $posts_arr = $wpdb->get_row("SELECT * FROM $table_name where id = $postid");  
        return $posts_arr;  
   }

   public function get_feeds_comments($feedid){
        global $wpdb;
        $table_name = APIF_MediaComments_Table;
        $comment_array = $wpdb->get_results("SELECT * FROM $table_name where feedID = $feedid");  
        return $comment_array;  
   }

   public function get_all_carousels( $feed_id ){
        global $wpdb;
        $table_name = APIF_Instagram_Feeds_Table;
        $carousel_arr = $wpdb->get_row("SELECT feed_id,carousel FROM $table_name where feed_id = $feed_id");  
        return $carousel_arr;  
   }
              

    public function correctTimeZone($date){
    $dt = new \DateTime("@{$date}");
    $dt->setTimezone(new \DateTimeZone(date_default_timezone_get()));
    return $dt->getTimestamp();
  }

   /*
  * Get Media Comments By Link or Feed ID
  */
  public function get_each_feed_comment($feed_link,$feed_id,$feed_type,$comment_counts){
       global $wpdb;
       $result = array();
       $instagram = $GLOBALS['insta_api'];
       $code =  basename($feed_link);
       if($feed_type == "any_user_timeline"){
            if($code == ''){
             $media = $instagram->getMediaById($feed_id);
           }else{
             $media = $instagram->getMediaById2($code);
           }
       }else{
           $media = $instagram->getMediaById2($code);
       } 
          foreach ( $media->getComments() as $comment ) {
            $from = new \stdClass();
            $from->id = $comment->getOwner()->getId();
            $from->username = $comment->getOwner()->getUsername();
            $from->full_name = $comment->getOwner()->getFullName();
            $from->profile_picture = $comment->getOwner()->getProfilePicUrl();

            $c = new \stdClass();
            $c->id = $comment->getId();
            $text = $comment->getText();
            
            if($feed_type == "any_user_timeline"){
                preg_match_all('/@\w+/',$text ,$matches);
               if(isset($matches[0])){
                foreach($matches[0] as $hashtag) {
                    $hash = str_replace('@', '', $hashtag);
                    $replace = "<a href='https://www.instagram.com/".$hash."/'>".$hashtag."</a>";
                    $ctext =  str_replace($hashtag, $replace, $text);
                }
               }else{
                      $ctext  = $text;
               }
           }else{
                   $ctext  = $text;
           }
           $c->text = $ctext;
            $c->created_time = $comment->getCreatedAt();
            $c->date = date('Y-m-d h:m:s', $comment->getCreatedAt());
            $c->from = $from;
            $result[] = $c;
        }

        $result = array_slice($result, 0, $comment_counts);

        include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
        $insta = new InstaWCD();
        $result = $insta->objectToArray($result); 
        return $result;
  }


  /*
  * Get Media Comments By Link or Feed ID
  */
  public function get_feeds_comment($feed_link,$feed_id,$feed_type){
       global $wpdb;
       $result = array();
       $instagram = $GLOBALS['insta_api'];
       $code =  basename($feed_link);
       //  echo $code;
       // $code = substr( $feed_link, strrpos( $feed_link, '/' ) + 1 );
       if($feed_type == "any_user_timeline"){
            if($code == ''){
             $media = $instagram->getMediaById($feed_id);
           }else{
             $media = $instagram->getMediaById2($code);
           }
       }else{
           $media = $instagram->getMediaById2($code);
       } 

       foreach ( $media->getComments() as $comment ) {
            $from = new \stdClass();
            $from->id = $comment->getOwner()->getId();
            $from->username = $comment->getOwner()->getUsername();
            $from->full_name = $comment->getOwner()->getFullName();
            $from->profile_picture = $comment->getOwner()->getProfilePicUrl();

            $c = new \stdClass();
            $c->id = $comment->getId();
            $c->text = $comment->getText();
            $c->created_time = $comment->getCreatedAt();
            $c->date = date('Y-m-d h:m:s', $comment->getCreatedAt());
            $c->from = $from;
            $result[] = $c;
        }
      // $this->displayArr($result);
      //   exit();
        //$wpdb->delete( APIF_MediaComments_Table, array( 'feedID'=> $feed_id ), array( '%d' ) );
        $wpdb->query('TRUNCATE TABLE '.APIF_MediaComments_Table);
        //echo $wpdb->last_query;
        if(!empty($result)){
            include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
            $insta = new InstaWCD();
            $result = $insta->objectToArray($result);  
            usort($result, function ($a, $b) {
                   if ($a['date'] == $b['date']) {
                       return 0;
                   }
               return ($a['date'] < $b['date']) ? -1 : 1;
            });
            $result = array_reverse($result);
            // $result = array_slice($result, 0, 10); 
            $result = array_chunk($result, 10);
        $comment_arr = array();
        foreach ($result[0] as $key => $post) {
           if($feed_type == "any_user_timeline"){
                preg_match_all('/@\w+/',$post['text'] ,$matches);
               if(isset($matches[0])){
                foreach($matches[0] as $hashtag) {
                    $hash = str_replace('@', '', $hashtag);
                    $replace = "<a href='https://www.instagram.com/".$hash."/'>".$hashtag."</a>";
                    $ctext =  str_replace($hashtag, $replace, $post['text']);
                }
               }else{
                      $ctext  = $post['text'];
               }
           }else{
                   $ctext  = $post['text'];
           }
              
             // $comment_date =  date('l M j, Y', $post->created_time);
                $comment_arr[] = array(
                  'feedID'        => $feed_id,
                  'commentID'     =>  $post['id'],
                  'comments'      => $ctext,
                  'created_time'  => $post['created_time'],
                  'additional'    => serialize($post['from']),
                  'extra_options' => ''
                  );
            }

          if(!empty($comment_arr)){
                foreach ($comment_arr as $key => $value) {
                   // $this->displayArr($value);
                   $wpdb->insert( APIF_MediaComments_Table, $value); 
                }
               
            }

        }

       $comments_array = $this->get_feeds_comments($feed_id);
       return $comments_array;
  }

  private  function date_compare($a, $b)
    {
        $t1 = strtotime($a['date']);
        $t2 = strtotime($b['date']);
        return $t1 - $t2;
    } 
 

}
$global['apifpro_musers'] = new APIFPRO_MediaUsers();
$GLOBALS['insta_api'] = new Instagram();
endif;