<?php
 global $apif_settings, $insta , $wpdb;
 // unset($filtered_array); 
    $filtered_array = array();
    $apif_settings = get_option( 'apif_settings' );
    
    $username = !empty($apif_settings['username']) ? $apif_settings['username'] : ''; // your username
    $access_token = !empty($apif_settings['access_token']) ? $apif_settings['access_token'] : '';
    $enable_cache = !empty($apif_settings['enable_cache']) ? $apif_settings['enable_cache'] : '0';
    $cache_period = !empty($apif_settings['cache_period']) ? $apif_settings['cache_period'] : '';
    $if_id =  intval($attr['id']);
    $table_name = $instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
    $in_feeds = $wpdb->get_results("SELECT * FROM $table_name where id = $if_id");
    $apif_settings = unserialize($in_feeds[0]->feed_settings);
    if(isset($apif_settings) && !empty($apif_settings)){
       foreach ($apif_settings as $key => $value) {
        $$key = $value;
       }  
    }else{
        $apif_settings = array();
    }
   
    // $this->displayArr($apif_settings);
    $hide_profile_link = (isset($apif_settings['hide_profile_link']) && $apif_settings['hide_profile_link'] == '1')?1:0;
    $hover_image_text_hcolor = (isset($apif_settings['hover_image_text_hcolor']) && $apif_settings['hover_image_text_hcolor'] != '')?$apif_settings['hover_image_text_hcolor']:'';
    $hover_image_comment_color = (isset($apif_settings['hover_image_comment_color']) && $apif_settings['hover_image_comment_color'] != '')?$apif_settings['hover_image_comment_color']:'';
    $hover_image_likes_color = (isset($apif_settings['hover_image_likes_color']) && $apif_settings['hover_image_likes_color'] != '')?$apif_settings['hover_image_likes_color']:'';

    $layout     = $apif_settings['instagram_mosaic'];
    $sort_by    = isset($apif_settings['sort_by']) ? $apif_settings['sort_by'] : 'date';
    $image_likes_count = $image_like = $like_count = isset($like_count) ? $like_count: '0';
    $image_comments_count = $image_comment_count = $comment_count = isset($comment_count) ? $comment_count : '0';
    $count = (isset($apif_settings['image_number']) && $apif_settings['image_number'] != '')?intval($apif_settings['image_number']):'10'; // number of images to show
    require_once('instagram.php');
    $insta = new InstaWCD();
    $insta->username = $username;
    $insta->access_token = $access_token;

    $feed_type = (isset($apif_settings['feed_type']) && $apif_settings['feed_type'] != '')?esc_attr($apif_settings['feed_type']):'recent_media';
    $personal_hashtag_name = (isset($apif_settings['personal_hashtag_name']) && $apif_settings['personal_hashtag_name'] != '')?$apif_settings['personal_hashtag_name']:'';
    $username_attr = isset($any_user_username) ? $any_user_username : 'instagram' ;
    $tag_name = isset($tag_name) ? $tag_name : 'followmeto' ;

switch ($feed_type) {
        //this case has been depriciated
        case 'self':
            //get the recent media uploaded by user
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->userMedia($count);
                $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $count;
                $i = 0;
                $blocked_image_caption_words = isset($recent_media_blocked_caption_words) ? $recent_media_blocked_caption_words: '';
                $allowed_image_caption_words = isset($recent_media_allowed_caption_words) ? $recent_media_allowed_caption_words: '';
                $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);
                $ins_media['data'] = $filtered_array['data'];
                if(!empty($filtered_array['data'])){
                    if(isset($filtered_array['pagination']['next_url'])){
                        $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                    }
                }else{
                    $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;
        //user's personal hash tag feeds
        case 'personal_hashtag':
            //get the recent media uploaded by user
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->userMedia($count);
                if(isset($enable_cache) || $enable_cache == '1'){
                    $phtag_feed_transient_name = 'personal_hasttag_feed_transient';
                    $phtag_feed_transient = get_transient($phtag_feed_transient_name);
                    if (false === $phtag_feed_transient) {
                        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $count;
                        $i = 0;
                        $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
                        $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
                        $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);
                        set_transient($phtag_feed_transient_name, $filtered_array, $cache_period * HOUR_IN_SECONDS );
                    }else{
                        $filtered_array = $phtag_feed_transient;
                    }
                }else{
                    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $count;
                    $i = 0;
                    $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
                    $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
                    $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);
                }
             /*   echo "<pre>";
                print_r($filtered_array );*/
                if(isset($filtered_array['data'])){
                    $ins_media['data'] = $filtered_array['data'];
                    if(!empty($filtered_array['data'])){
                        if(isset($filtered_array['pagination']['next_url'])){
                            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                        }
                    }else{
                        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                    }
                }else{
                    $ins_media = $filtered_array;
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;
        
        //user's recent media
        case 'recent_media':
            //get the recent media uploaded by user
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->userMedia($count);
                if(isset($enable_cache) && $enable_cache == '1'){
                    $recent_feed_transient_name = 'recent_feed_transient';
                    $recent_feed_transient = get_transient($recent_feed_transient_name);
                    if (false === $recent_feed_transient) {
                        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $count;
                        $i = 0;
                        $blocked_image_caption_words = isset($recent_media_blocked_caption_words) ? $recent_media_blocked_caption_words: '';
                        $allowed_image_caption_words = isset($recent_media_allowed_caption_words) ? $recent_media_allowed_caption_words: '';
                        $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);
                        set_transient($recent_feed_transient_name, $filtered_array, $cache_period * HOUR_IN_SECONDS );
                    }else{
                        $filtered_array = $recent_feed_transient;
                    }
                }else{
                    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token . '&count=' . $count;
                    $i = 0;
                    $blocked_image_caption_words = isset($recent_media_blocked_caption_words) ? $recent_media_blocked_caption_words: '';
                    $allowed_image_caption_words = isset($recent_media_allowed_caption_words) ? $recent_media_allowed_caption_words: '';
                    $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);
                }
              /* echo "<pre>";
                print_r($filtered_array );
                exit();*/
                if(isset($filtered_array['data'])){

                    $ins_media['data'] = $filtered_array['data'];
                    if(!empty($filtered_array['data'])){
                        if(isset($filtered_array['pagination']['next_url'])){
                            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                        }
                    }else{
                        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                    }
                }else{
                    $ins_media = $filtered_array;
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
         /*   echo "<pre>";
                print_r($ins_media );
                exit();*/
            break;

        //user's likes
        case 'likes':
            //for user likes feed
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->userLiked($count);
                if(!isset($enable_cache) || $enable_cache == '1'){
                    $likes_feed_transient_name = 'likes_feed_transient';
                    $likes_feed_transient = get_transient($likes_feed_transient_name);
                    if (false === $likes_feed_transient) {
                        $url = 'https://api.instagram.com/v1/users/self/media/liked?access_token=' . $access_token . '&count=' . $count;
                        $i = 0;
                        $count=$count;
                        $blocked_image_caption_words = isset($user_likes_blocked_caption_words) ? $user_likes_blocked_caption_words: '';
                        $allowed_image_caption_words = isset($user_likes_allowed_caption_words) ? $user_likes_allowed_caption_words: '';
                        
                        $blocked_username_words      = isset($user_likes_blocked_username_words) ? $user_likes_blocked_username_words: '';
                        $allowed_username_words      = isset($user_likes_allowed_username_words) ? $user_likes_allowed_username_words: '';

                        $filtered_array = $insta->getFilteredUserLiked( $url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words );
                        set_transient($likes_feed_transient_name, $filtered_array, $cache_period * HOUR_IN_SECONDS );
                    }else{
                        $filtered_array = $likes_feed_transient;
                    }
                }else{
                    $url = 'https://api.instagram.com/v1/users/self/media/liked?access_token=' . $access_token . '&count=' . $count;
                    $i = 0;
                    $count=$count;
                    $blocked_image_caption_words = isset($user_likes_blocked_caption_words) ? $user_likes_blocked_caption_words: '';
                    $allowed_image_caption_words = isset($user_likes_allowed_caption_words) ? $user_likes_allowed_caption_words: '';
                    
                    $blocked_username_words      = isset($user_likes_blocked_username_words) ? $user_likes_blocked_username_words: '';
                    $allowed_username_words      = isset($user_likes_allowed_username_words) ? $user_likes_allowed_username_words: '';

                    $filtered_array = $insta->getFilteredUserLiked( $url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words );
                }

                if(isset($filtered_array['data'])){
                    $ins_media['data'] = $filtered_array['data'];
                    if(!empty($filtered_array['data'])){
                        if(isset($filtered_array['pagination']['next_url'])){
                            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                        }
                    }else{
                        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                    }
                }else{
                    $ins_media = $filtered_array;
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;

        //this case has been depriciated    
        case 'popular_feeds':
            // for the instagram popular feeds
            $ins_media = $insta->instagramPopular($count);
            break;

        case 'hashtag':
        $insta_posts = APIF_Instagram_Feeds_Table;
        $insta_media_feeds = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $if_id");
       
         if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
                $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
                $blocked_username_words      = isset($tag_blocked_username_words) ? $tag_blocked_username_words: '';
                $allowed_username_words      = isset($tag_allowed_username_words) ? $tag_allowed_username_words: '';
                /*$hastag_transient_feed_transient = 'hastag_transient_'.$if_id;
                delete_transient($hastag_transient_feed_transient);*/
                if(!isset($enable_cache) || $enable_cache == '1'){
                    $hastag_transient_feed_transient = 'hastag_transient_'.$if_id;
                    $hastag_transient_transient = get_transient($hastag_transient_feed_transient);
                    if (false === $hastag_transient_transient) {
                        $i = 0;
                         $insta_media_feeds = $insta->objectToArray($insta_media_feeds);
                         $filtered_array = $insta->get_feeds_bytag_alternate($insta_media_feeds,$i,  $blocked_username_words, $allowed_username_words,$blocked_image_caption_words,$allowed_image_caption_words);

                        set_transient($hastag_transient_feed_transient, $filtered_array, $cache_period * HOUR_IN_SECONDS ); 
                    }else{
                         $filtered_array = $hastag_transient_transient;
                        
                    }
                }else{
                    $i = 0;
                   $insta_media_feeds = $insta->objectToArray($insta_media_feeds);
                   $filtered_array = $insta->get_feeds_bytag_alternate($insta_media_feeds,$i, $blocked_username_words, $allowed_username_words,$blocked_image_caption_words,$allowed_image_caption_words);
                   
                }

              // $this->displayArr($filtered_array);exit();
                if(isset($filtered_array) && !empty($filtered_array)){
                   $ins_media['data'] = $filtered_array;
                }else{
                 $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                }  
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Missing Configuration Issue is found.'));
            }
        break;
        //any user get media feeds 
        case 'any_user_timeline':
          //for any user timeline
  
        $insta_posts = APIF_Instagram_Feeds_Table;
        $any_user_blocked_caption_words = isset($any_user_username_blocked_caption_words) ? $any_user_username_blocked_caption_words : '';
        $any_userallowed_caption_words = isset($any_user_username_allowed_caption_words) ? $any_user_username_allowed_caption_words : '';

        $insta_media_feeds = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $if_id");
        //$this->displayArr($insta_media_feeds);

            //$username  = $username_attr;
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
               //delete_transient('any_user_timeline_feed_transient_'.$if_id);
                if(!isset($enable_cache) || $enable_cache == '1'){
                    $any_user_timeline_feed_transient = 'any_user_timeline_feed_transient_'.$if_id;
                    $any_user_feed_transient = get_transient($any_user_timeline_feed_transient);
                    if (false === $any_user_feed_transient) {
                        $i = 0;
                         $insta_media_feeds = $insta->objectToArray($insta_media_feeds);
                         $filtered_array = $insta->get_anyuser_feeds($insta_media_feeds,$i,  $any_user_blocked_caption_words, $any_userallowed_caption_words);

                        set_transient($any_user_timeline_feed_transient, $filtered_array, $cache_period * HOUR_IN_SECONDS ); 
                    }else{
                         $filtered_array = $any_user_feed_transient;
                        
                    }
                }else{
                    $i = 0;
                   $insta_media_feeds = $insta->objectToArray($insta_media_feeds);
                   $filtered_array = $insta->get_anyuser_feeds($insta_media_feeds,$i, $any_user_blocked_caption_words, $any_userallowed_caption_words);
                   
                }

               // $this->displayArr($filtered_array);exit();
                if(isset($filtered_array) && !empty($filtered_array)){
                   $ins_media['data'] = $filtered_array;
                }else{
                 $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                }  
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }

          //$this->displayArr(  $ins_media['data']);
          //exit();
        break;
        //get any user media
        case 'any_user':
            //for any user
            $username  = $username_attr;
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->anyUserFeed($username, $count);
                // $apif_settings['cache_period'] = '12';
                // $apif_settings['enable_cache'] = '1';
                if(!isset($enable_cache) || $enable_cache == '1'){
                    $any_feed_transient_name = 'any_user_feed_transient';
                    $any_feed_transient = get_transient($any_feed_transient_name);
                    if (false === $any_feed_transient) {
                        $user_id = $insta->userID( $username );
                        $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $access_token . '&count=' . $count;
                        $i = 0;
                        $count=$count;
                        $any_user_username_blocked_caption_words = isset($any_user_username_blocked_caption_words) ? $any_user_username_blocked_caption_words : '';
                        $any_user_username_allowed_caption_words = isset($any_user_username_allowed_caption_words) ? $any_user_username_allowed_caption_words : '';
                        $filtered_array = $insta->get_username_feeds($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words);
                        set_transient($any_feed_transient_name, $filtered_array, $cache_period * HOUR_IN_SECONDS );
                    }else{
                        $filtered_array = $any_feed_transient;
                        // var_dump($filtered_array);
                    }
                }else{
                    $user_id = $insta->userID( $username );
                    $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $access_token . '&count=' . $count;
                    $i = 0;
                    $count=$count;
                    $any_user_username_blocked_caption_words = isset($any_user_username_blocked_caption_words) ? $any_user_username_blocked_caption_words : '';
                    $any_user_username_allowed_caption_words = isset($any_user_username_allowed_caption_words) ? $any_user_username_allowed_caption_words : '';
                    $filtered_array = $insta->get_username_feeds($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words);
                }

                if(isset($filtered_array['data'])){
                    $ins_media['data'] = $filtered_array['data'];
                    if(!empty($filtered_array['data'])){
                        if(isset($filtered_array['pagination']['next_url'])){
                            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                        }
                    }else{
                        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                    }
                }else{
                    $ins_media = $filtered_array;
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;

        // for recent tag media
        case 'tag':
            $tag_name = $tag_name;
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                // $ins_media = $insta->getTagRecentMedia($tag_name, $count);
                if(!isset($enable_cache) || $enable_cache == '1'){
                    $cache_period = $cache_period;
                    $tag_feed_transient_name = 'tag_feed_transient';
                    $tag_feed_transient = get_transient($tag_feed_transient_name);
                    if (false === $tag_feed_transient) {
                        $url = "https://api.instagram.com/v1/tags/{$tag_name}/media/recent?access_token=" . $access_token . '&count=' . $count;
                        $i = 0;
                        $count=$count;
                        $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
                        $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
                        $blocked_username_words      = isset($tag_blocked_username_words) ? $tag_blocked_username_words: '';
                        $allowed_username_words      = isset($tag_allowed_username_words) ? $tag_allowed_username_words: '';
                        $filtered_array = $insta->getFilteredTagRecentMedia( $url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words);
                        set_transient($tag_feed_transient_name, $filtered_array, $cache_period * HOUR_IN_SECONDS );
                    }else{
                        $filtered_array = $tag_feed_transient;
                    }
                }else{
                    $url = "https://api.instagram.com/v1/tags/{$tag_name}/media/recent?access_token=" . $access_token . '&count=' . $count;
                    $i = 0;
                    $count=$count;
                    $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
                    $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
                    $blocked_username_words      = isset($tag_blocked_username_words) ? $tag_blocked_username_words: '';
                    $allowed_username_words      = isset($tag_allowed_username_words) ? $tag_allowed_username_words: '';
                    $filtered_array = $insta->getFilteredTagRecentMedia( $url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words );
                }

                if(isset($filtered_array['data'])){
                    $ins_media['data'] = $filtered_array['data'];
                    if(!empty($filtered_array['data'])){
                        if(isset($filtered_array['pagination']['next_url'])){
                            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
                        }
                    }else{
                        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
                    }
                }else{
                    $ins_media = $filtered_array;
                }
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;

        default:
            // get the self user media
            if($username == '' && $access_token ==''){
                $ins_media = array('meta'=>array('error_message'=>'Username and access token field is empty. Please configure.'));

            }else if($username == ''){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));

            }else if ($access_token == ''){
                $ins_media = array('meta'=>array('error_message'=>'Access token field is empty.'));
            }else{
                $ins_media = $insta->userMedia($count);
            }

            if($ins_media == NULL){
                $ins_media = array('meta'=>array('error_message'=>'Username field is empty.'));
            }
            break;
    }



//Here is the filtered instagram medias array as $ins_media['data'] as per the need
/*$this->displayArr($ins_media);
    echo $feed_type;
    exit();*/
// if($feed_type != 'any_user_timeline' && $feed_type != 'hashtag'){
if($feed_type == "recent_media" || $feed_type == "tag" || $feed_type == "personal_hashtag"){
if(!empty($ins_media['data'])){
    $formated_array = array();
    $sort_images_by = $sort_by;

    foreach($ins_media['data'] as $key=>$data) {
        $likes = esc_attr($data['likes']['count']);
        $comments = esc_attr($data['comments']['count']);
        $formated_array[$key] = $data;
        $formated_array[$key]['likes_count'] = $likes;
        $formated_array[$key]['comment_count'] = $comments;
    };

    // echo $sort_images_by;
    if(!empty($sort_images_by) && $sort_images_by =='random') {
        shuffle($formated_array);
    }else if(!empty($sort_images_by) && $sort_images_by == 'likes') {
        if($formated_array){
            usort($formated_array, array($this, 'SortByLikesOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'comments') {
        if($formated_array){
            usort($formated_array, array( $this, 'SortByCommentOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'date') {
         if($formated_array){
            usort($formated_array, array( $this, 'SortByDateOrder'));
        }
    }
    $ins_media['data'] = $formated_array;
}
}else{


if(!empty($ins_media['data'])){
         $formated_array = array();
         $sort_images_by = $sort_by;
         foreach($ins_media['data'] as $key=>$data) {
             $additional = (isset($data['additional']) && !empty($data['additional']))?unserialize($data['additional']):array();
             $caption = (isset($data['description']) && !empty($data['description']))?$data['description']:'';
             $permalink = (isset($data['permalink']) && !empty($data['permalink']))?esc_url($data['permalink']):'';
             $profile_link = (isset($data['profile_link']) && !empty($data['profile_link']))?esc_url($data['profile_link']):'';
             $image_arr = (isset($data['img']) && !empty($data['img']))?unserialize($data['img']):array();
             $carousel = (isset($data['carousel']) && !empty($data['carousel']))?unserialize($data['carousel']):array();
             $media_arr = (isset($data['media']) && !empty($data['media']))?unserialize($data['media']):array();
             $location_arr = (isset($data['location']) && !empty($data['location']))?unserialize($data['location']):array();
             $userMeta = (isset($data['userMeta']) && !empty($data['userMeta']))?unserialize($data['userMeta']):array();
            
             $userMeta = (array)$userMeta;
             $location_arr = (array)$location_arr;
             $media_arr = (array)$media_arr;
             if(!empty($userMeta)){
                $username = esc_attr($userMeta['username']);
                $full_name = esc_attr($userMeta['full_name']);
                $id = esc_attr($userMeta['id']);
                $bio = esc_attr($userMeta['bio']);
                $website = esc_attr($userMeta['website']);
                $counts = (isset($userMeta['counts']) && !empty($userMeta['counts']))?(array)$userMeta['counts']:array();
                $profile_picture = esc_url($userMeta['profile_picture']);
                if(!empty($counts)){
                    $media = esc_attr($counts['media']);
                    $follows = esc_attr($counts['follows']);
                    $followed_by = esc_attr($counts['followed_by']);
                 }else{
                    $media = $follows = $followed_by = 0;
                 }
                
             }else{
                $username = '';
                $full_name = '';
                $id = '';
                $bio = '';
                $website = '';
                $counts = '';
                $profile_picture = '';
             }

             if(!empty($additional)){
                $likes = esc_attr($additional['likes']);
                $comments = esc_attr($additional['comments']);
             }else{
                $likes = $comments = 0;
             }
             if(!empty($image_arr)){
                $img_url = esc_url($image_arr['url']);
                $width = esc_attr($image_arr['width']);
                $height = esc_attr($image_arr['height']);
             }else{
                $img_url = '';
                $width = '';
                $height = '';
             }
             if(!empty($media_arr)){
                $starndard_resolution_type = esc_url($media_arr['type']);
                if($data['media_type'] == "video"){
                    $starndard_resolution_video_url = esc_url($media_arr['url']);
                }else{
                    $starndard_resolution_video_url = '';
                }
                
                $starndard_resolution_width = esc_attr($media_arr['width']);
                $starndard_resolution_height = esc_attr($media_arr['height']);
             }else{
                $starndard_resolution_video_url = '';
                $starndard_resolution_width = '';
                $starndard_resolution_height = '';
             }
           
              
            $location_id = (isset($location_arr['id']) && $location_arr['id'] != '')?esc_attr($location_arr['id']):'';
            $lname = (isset($location_arr['name']) && $location_arr['name'] != '')?esc_attr($location_arr['name']):'';
            $lslug = (isset($location_arr['slug']) && $location_arr['slug'] != '')?esc_attr($location_arr['slug']):'';
            
            $tags_arr = array();
            preg_match_all('/#\w+/',$caption,$matches);
            if(isset($matches[0]) && !empty($matches[0])) {
                foreach($matches[0] as $hashtag) {
                     $tags_arr[] = $hashtag;
                }
            }
           /*  if( $caption != ''){
                $pieces = explode(" ", $caption);
                if(!empty($pieces)){
                     for ($pieces = 0; $i < count($pieces); $i++) { 
                   if (strpos($pieces[$i], "#") !== false){
                    $tags_arr[] = $pieces[$i];
                   }
                } 
                }   
             }*/
             
             $formated_array[$key] = $data;
             $formated_array[$key]['videos']['low_bandwidth']['url'] = $starndard_resolution_video_url;
             $formated_array[$key]['likes_count'] = $likes;
             $formated_array[$key]['comment_count'] = $comments;
             $formated_array[$key]['user']['id'] = $location_id;
             $formated_array[$key]['user']['full_name'] = $full_name;
             $formated_array[$key]['user']['profile_picture'] = (isset($data['userpic']) && $data['userpic'] != '')?esc_url($data['userpic']):$profile_picture;
             $formated_array[$key]['user']['username'] = $username;
             $formated_array[$key]['images']['thumbnail']['url'] = $img_url;
             $formated_array[$key]['images']['thumbnail']['width'] = $width;
             $formated_array[$key]['images']['thumbnail']['height'] = $height;
             $formated_array[$key]['images']['standard_resolution']['url'] = $img_url;
             $formated_array[$key]['images']['low_resolution']['url'] = $img_url;
             $formated_array[$key]['images']['standard_resolution']['width'] = $width;
             $formated_array[$key]['images']['low_resolution']['width'] = $width;
             $formated_array[$key]['images']['standard_resolution']['height'] = $height;
             $formated_array[$key]['images']['low_resolution']['height'] = $height;
             $formated_array[$key]['created_time'] = (isset($data['system_timestamp']) && $data['system_timestamp'] != '')?esc_attr($data['system_timestamp']):'';
             $formated_array[$key]['caption']['text'] = $caption;
             $formated_array[$key]['caption']['from']['username'] = $username;
             $formated_array[$key]['user_has_liked'] = '';
             $formated_array[$key]['likes']['count'] = $likes;
             $formated_array[$key]['tags'] = $tags_arr;
             $formated_array[$key]['filter'] = 'Normal';
             $formated_array[$key]['comments']['count'] = $comments;
             $formated_array[$key]['type'] = (isset($data['media_type']) && $data['media_type'] != '')?esc_attr($data['media_type']):'';
             $formated_array[$key]['link'] = $permalink;
             // $formated_array[$key]['location']['name'] = $lname;
             // $formated_array[$key]['location']['id'] = $location_id;
             $formated_array[$key]['attribution'] = '';
             $formated_array[$key]['users_in_photo'] = '';
    }
          // echo $sort_images_by;
    if(!empty($sort_images_by) && $sort_images_by =='random') {
        shuffle($formated_array);
    }else if(!empty($sort_images_by) && $sort_images_by == 'likes') {
        if($formated_array){
            usort($formated_array, array($this, 'SortByLikesOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'comments') {
        if($formated_array){
            usort($formated_array, array( $this, 'SortByCommentOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'date') {
         if($formated_array){
            usort($formated_array, array( $this, 'SortByDateOrder'));
        }
    }
    $ins_media['data'] = $formated_array;
   }

  if($layout == "grid_layout"){
    $grid_layout_load_more_button_enable = (isset($grid_layout_load_more_button_enable) && $grid_layout_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $grid_layout_load_more_button_enable;
  }else if($layout == "grid_layout1"){
    $grid_layout1_load_more_button_enable = (isset($grid_layout1_load_more_button_enable) && $grid_layout1_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $grid_layout1_load_more_button_enable;
  }else if($layout == "grid_layout2"){
    $grid_layout3_load_more_button_enable = (isset($grid_layout3_load_more_button_enable) && $grid_layout3_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $grid_layout3_load_more_button_enable;
  }else if($layout == "masonry_layout"){
    $masonary_layout_load_more_button_enable = (isset($masonary_layout_load_more_button_enable) && $masonary_layout_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout_load_more_button_enable;
  }else if($layout == 'masonry_layout1'){
     $masonary_layout1_load_more_button_enable = (isset($masonary_layout1_load_more_button_enable) && $masonary_layout1_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout1_load_more_button_enable;
  }else if($layout == 'masonry_layout2'){
     $masonary_layout2_load_more_button_enable = (isset($masonary_layout2_load_more_button_enable) && $masonary_layout2_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout2_load_more_button_enable;
  }else if($layout == 'masonry_layout3'){
     $masonary_layout3_load_more_button_enable = (isset($masonary_layout3_load_more_button_enable) && $masonary_layout3_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout3_load_more_button_enable;
  }else if($layout == 'masonry_layout4'){
      $masonary_layout4_load_more_button_enable = (isset($masonary_layout4_load_more_button_enable) && $masonary_layout4_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout4_load_more_button_enable;
  }else if($layout == 'masonry_layout5'){
    $masonary_layout5_load_more_button_enable = (isset($masonary_layout5_load_more_button_enable) && $masonary_layout5_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $masonary_layout5_load_more_button_enable;
  }else if($layout == 'instagram_layout'){
    $instagram_layout_load_more_button_enable = (isset($instagram_layout_load_more_button_enable) && $instagram_layout_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $instagram_layout_load_more_button_enable;
  }else if($layout == 'round_image'){
    $round_image_layout_load_more_button_enable = (isset($round_image_layout_load_more_button_enable) && $round_image_layout_load_more_button_enable == 1)?1:0;
    $ins_media['pagination']['status'] = $round_image_layout_load_more_button_enable;
  }else{
   $ins_media['pagination']['status'] = 0;
  }
   $ins_media['pagination']['next_url'] = '#';
}
/*$this->displayArr($ins_media);
exit();*/
?>
<style type="text/css">
.apif-img-zoomout:hover figure:before{ background: <?php echo $theme_accent_color; ?> }
</style>

    <?php include('scripts.php'); ?>
    <?php
    if(isset($attr['layout']) && $attr['layout'] != ''){
        $layout = $attr['layout'];
    }
    if(isset($attr['column']) && $attr['column'] != ''){
        $shortcode_column = $attr['column'];
    }else{
        $shortcode_column = '';
    }

    if(isset($attr['show_share_icon']) && $attr['show_share_icon'] == 1){
        $show_share_icon = 1;
    }else{
        $show_share_icon = 0;
    }

if ($layout == 'mosaic' || $layout == 'mosaic_lightview') {
 include(APIF_INST_PATH.'inc/frontend/advanced/mosaic-layout.php'); 
} else if ($layout == 'slider') {
 //owl slider layout
 include(APIF_INST_PATH.'inc/frontend/slider/slider-layout.php');
}else if ($layout == 'grid_layout'){
 include(APIF_INST_PATH.'inc/frontend/grid/grid_layout.php');
}else if ($layout == 'grid_layout1'){
 include(APIF_INST_PATH.'inc/frontend/grid/grid_layout.php');
}else if ($layout == 'grid_layout2'){
 include(APIF_INST_PATH.'inc/frontend/grid/grid_layout2.php');
}else if($layout == 'masonry_layout'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout.php');
}else if($layout == 'masonry_layout1'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout1.php');  
}else if($layout == 'masonry_layout2'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout2.php');   
}else if($layout == 'masonry_layout3'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout3.php');   
}else if($layout == 'masonry_layout4'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout4.php');  
}else if($layout == 'masonry_layout5'){
 include(APIF_INST_PATH.'inc/frontend/masonry/masonry-layout5.php');  
}else if( $layout == 'instagram_layout' ){
 include(APIF_INST_PATH.'inc/frontend/advanced/instagram-layout.php');
}else if($layout == 'round_image'){
 include(APIF_INST_PATH.'inc/frontend/advanced/round-image-layout.php');
}else if($layout == 'grid_rotator'){
 include(APIF_INST_PATH.'inc/frontend/grid/grid-rotator-layout.php');
}else if($layout == 'slider_1_layout'){
 include(APIF_INST_PATH.'inc/frontend/slider/slider_1_layout.php');
// nivo slider
}else if($layout == 'slider_2_layout'){
// bx slider
 include(APIF_INST_PATH.'inc/frontend/slider/slider_2_layout.php');
}else if($layout == 'slider_3_layout'){
// nivo slider
 include(APIF_INST_PATH.'inc/frontend/slider/slider_3_layout.php');
}else if($layout == 'slider_4_layout'){
// nivo slider
 include(APIF_INST_PATH.'inc/frontend/slider/slider_4_layout.php');
}else if($layout == 'slider_5_layout'){
// nivo slider
include(APIF_INST_PATH.'inc/frontend/slider/slider_5_layout.php');
}else if($layout == 'slider_6_layout'){
// carousel post slider
 include(APIF_INST_PATH.'inc/frontend/slider/carousel-post-slider.php');
}else if($layout == 'slider_7_layout'){
// carousel row slider
 include(APIF_INST_PATH.'inc/frontend/slider/carousel-row-slider.php');
}else if($layout == 'filter_template1' || $layout == 'filter_template4' || $layout == 'filter_template5'){
// Filter layout
 include(APIF_INST_PATH.'inc/frontend/filter/filter-layout.php');
}else if($layout == 'filter_template2'){
// Filter layout
 include(APIF_INST_PATH.'inc/frontend/filter/filter-layout2.php');
}else if($layout == 'filter_template3'){
// Filter layout
 include(APIF_INST_PATH.'inc/frontend/filter/filter-layout3.php');
}