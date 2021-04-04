<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-content">
	<a href="<?php echo (!empty($uab_facebook_feeds[$x]['link'])?$uab_facebook_feeds[$x]['link']:'#');?>"><?php echo (!empty($uab_facebook_feeds[$x]['story'])?$uab_facebook_feeds[$x]['story']:'');?></a>
	<?php 
	$fb_message = !empty($uab_facebook_feeds[$x]['message'])?$uab_facebook_feeds[$x]['message']:'';
// The Regular Expression filter
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
$reg_hastag = '/#(\w+)/';

// Check if there is a url in the text
if(preg_match($reg_exUrl, $fb_message, $url)) {

       // make the urls hyper links
       $fb_message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $fb_message);

} 
if(preg_match($reg_hastag, $fb_message, $hashtag)) {
       // make the urls hyper links
       $fb_message = preg_replace($reg_hastag, '<a href="https://www.facebook.com/hashtag/'.$hashtag[1].'" rel="nofollow" target="_blank">'.$hashtag[0].'</a>', $fb_message);

}

       // if no urls in the text just return the text
       _e($fb_message);
?>
</div>

