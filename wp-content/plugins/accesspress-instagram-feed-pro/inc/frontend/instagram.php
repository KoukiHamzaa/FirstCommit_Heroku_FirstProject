<?php
class InstaWCD
{
    
    static function xTimeAgo( $tm, $rcs = 0 )
    {
        $cur_tm = time();
        $dif = $cur_tm - $tm;
        $pds = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');
        $lngh = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
        
        for( $v = sizeof( $lngh ) - 1;( $v >= 0 ) &&(( $no = $dif / $lngh[$v] ) <= 1 );$v-- );
        if( $v < 0 )$v = 0;
        $_tm = $cur_tm -( $dif % $lngh[$v] );
        $no = floor( $no );
        if( $no <> 1 )$pds[$v].= 's';
        $x = sprintf( "%d %s ", $no, $pds[$v] );
        if(( $rcs == 1 ) &&( $v >= 1 ) &&(( $cur_tm - $_tm ) > 0 ) )$x.= time_ago( $_tm );
        return $x . 'ago';
    }
    
    function userID( $username )
    {
        $token = $this->access_token;
        $username = strtolower( $username ); // sanitization
        if( !empty( $username ) && !empty( $token ) )
        {
            $url = "https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $token;
            $get = wp_remote_get( $url );
            $response = wp_remote_retrieve_body( $get );
            $json = json_decode( $response );
            if(isset($json->data)){
                foreach( $json->data as $user )
                {
                    if( $user->username == $username )
                    {
                        return $user->id;
                    }
                }
            }
            return '00000000'; // return this if nothing is found
            
        }
    }

    /**
     * function to get the recent media uploaded by user
     */
    function userMedia( $count )
    {
        $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }

    function getFilteredUserMedia($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words){
        static  $filtered_array = array(), $counter_run = 0;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        $data = $json;
        $ins_links=array();
        $page=$data['pagination'];
        $dataarray=$data['data'];
        $datacount=count($dataarray);
        $pagination_id = '';

        foreach( $data['data'] as $vm ){
            if($i<$count){
                if( ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ){
                    ////////////////////////////////////////////////////////////////////////////////
                    $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    if($blocked_words !=''){
                        $blocked_words_array = explode( ',', $blocked_words );
                    }else{
                        $blocked_words_array = array();
                    }
                    $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                    $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    ///////////////////////////////////////////////////////////////////////////////////

                    ///////////////////////////////////////////////////////////////////////////////////
                    $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    if($allowed_words !=''){
                        $allowed_words_array = explode( ',', $allowed_words );
                    }else{
                        $allowed_words_array = array();
                    }

                    $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                    $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    ///////////////////////////////////////////////////////////////////////////////////////
                    if($block == TRUE ){
                        continue;
                    }else if($allow != TRUE ){
                        continue;
                    }else{
                        $filtered_array[$i++] =$vm;
                        $pagination_id = $vm['id'];
                    }
                }else if ((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words =='')){
                    ////////////////////////////////////////////////////////////////////////////////
                    $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    if($blocked_words !=''){
                        $blocked_words_array = explode( ',', $blocked_words );
                    }else{
                        $blocked_words_array = array();
                    }
                    $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );
                    $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    ///////////////////////////////////////////////////////////////////////////////////
                    if($block == true ){
                        continue;
                    }else{
                        $filtered_array[$i++] =$vm;
                        $pagination_id = $vm['id'];
                    }
                }else if((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words =='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='')){
                    ///////////////////////////////////////////////////////////////////////////////////
                    $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    if($allowed_words !=''){
                        $allowed_words_array = explode( ',', $allowed_words );
                    }else{
                        $allowed_words_array = array();
                    }
                    $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );
                    $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    ///////////////////////////////////////////////////////////////////////////////////////
                    if($allow != TRUE ){
                        continue;
                    }else{
                        $filtered_array[$i++] =$vm;
                        $pagination_id = $vm['id'];
                    }
                }else{
                    $filtered_array[$i++] = $vm;
                    $pagination_id = $vm['id'];
                }
            }else{

            }
        }


        if($i<$count){
            if($counter_run <10){
                $counter_run++;
                if(isset($page['next_url'])){
                    return self::getFilteredUserLiked($page['next_url'],$i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words);
                }else{
                    $new_filtered_array['data'] = $filtered_array;
                    $new_filtered_array['pagination'] = array();
                    return $new_filtered_array;
                }
            }else{
                $new_filtered_array['data'] = $filtered_array;
                $new_filtered_array['pagination'] = array();
                return $new_filtered_array;
            }
        }else{
            $new_filtered_array['data']= $filtered_array;
            if(isset($page['next_url'])){
                $result = explode('max_like_id=', $page['next_url']);
                $next_url = $result[0].'max_like_id='.$pagination_id;
                $new_filtered_array['pagination']['next_url'] = $next_url;
            }
            return $new_filtered_array;
            // continue;
        }
    }
    
    function anyUserFeed( $username, $count )
    {
        $user_id = $this->userID( $username );
        $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?access_token=' . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }

    /*
    *  Get Filter Username Timeline Feeds By Scraping Way
    */
    public function get_anyuser_feeds($feeds_arr,$i, $blocked_words, $allowed_words){
       $filtered_array = array(); $counter_run = 0;
        if(isset($feeds_arr) && !empty($feeds_arr)){
            foreach( $feeds_arr as $vm ){
            if( ( isset($blocked_words) && $blocked_words!='' ) && (isset($allowed_words) && $allowed_words !='') ){
                                ////////////////////////////////////////////////////////////////////////////////
                                $blocked_words = ( isset($blocked_words) && $blocked_words!='' ) ? $blocked_words : '';
                                if($blocked_words !=''){
                                    $blocked_words_array = explode( ',', $blocked_words );
                                }else{
                                    $blocked_words_array = array();
                                }
                                $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                                $block = IF_Pro_Class:: contains($vm['description'], $blocked_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////

                                ///////////////////////////////////////////////////////////////////////////////////
                                $allowed_words = (isset($allowed_words) && $allowed_words !='') ? $allowed_words : '';
                                if($allowed_words !=''){
                                    $allowed_words_array = explode( ',', $allowed_words );
                                }else{
                                    $allowed_words_array = array();
                                }

                                $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                                $allow = IF_Pro_Class:: contains($vm['description'], $allowed_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////////
                                if($block == TRUE ){
                                    continue;
                                }else if($allow != TRUE ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] = $vm;
                                    //$pagination_id = $vm['id'];
                                }
                            }else if ((isset($blocked_words) && $blocked_words!='' ) && (isset($allowed_words) && $allowed_words =='')){
                                ////////////////////////////////////////////////////////////////////////////////
                                $blocked_words = ( isset($blocked_words) && $blocked_words!='' ) ? $blocked_words : '';
                                if($blocked_words !=''){
                                    $blocked_words_array = explode( ',', $blocked_words );
                                }else{
                                    $blocked_words_array = array();
                                }
                                $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );
                                $block = IF_Pro_Class:: contains($vm['description'], $blocked_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////
                                if($block == true ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] =$vm;
                                    //$pagination_id = $vm['id'];
                                }
                            }else if((isset($blocked_words) && $blocked_words =='' ) && (isset($allowed_words) && $allowed_words !='')){
                                ///////////////////////////////////////////////////////////////////////////////////
                                $allowed_words = (isset($allowed_words) && $allowed_words !='') ? $allowed_words : '';
                                if($allowed_words !=''){
                                    $allowed_words_array = explode( ',', $allowed_words );
                                }else{
                                    $allowed_words_array = array();
                                }
                                $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );
                                $allow = IF_Pro_Class:: contains($vm['description'], $allowed_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////////
                                if($allow != TRUE ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] =$vm;
                                }
                            }else{
                                $filtered_array[$i++] = $vm;
                            }
                        }
               $new_filtered_array = $filtered_array;
               return $new_filtered_array;
    
        }else{
          return $feeds_arr;
        }

    }

    /*
    *  Get Filter Hashtag Feeds By Scraping Way
    */
    public function get_feeds_bytag_alternate($feeds_arr,$i, $blocked_username, $allowed_username,$blocked_image_caption_words,$allowed_image_caption_words){
       $filtered_array = array(); $counter_run = 0;
        if(isset($feeds_arr) && !empty($feeds_arr)){
            foreach( $feeds_arr as $vm ){

            $allowed_words =(isset($allowed_image_caption_words) && $allowed_image_caption_words !='') ? $allowed_image_caption_words : '';
            $blocked_words = ( isset($blocked_image_caption_words) && $blocked_image_caption_words!='' ) ? $blocked_image_caption_words : '';
            // $allowed_usernames = '';
            // $blocked_usernames = 'kirstin_wende, exclusive_store22, kunlin850425';
            $allowed_usernames = ( isset($allowed_username) && $allowed_username!='' ) ? $allowed_username : '';
            $blocked_usernames = ( isset($blocked_username) && $blocked_username!='' ) ? $blocked_username : '';

            ////////////////////////////////////////////////////////////////////////////////////////////
            if($blocked_words !=''){
                $blocked_words_array = explode( ',', $blocked_words );
            }else{
                $blocked_words_array = array();
            }
            $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

            $block_word = IF_Pro_Class:: contains($vm['description'], $blocked_words_array_trimmed);
            
            ////////////////////////////////////////////////////////////////////////////////////////////
            if($allowed_words !=''){
                $allowed_words_array = explode( ',', $allowed_words );
            }else{
                $allowed_words_array = array();
            }

            $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

            $allow_word = IF_Pro_Class:: contains($vm['description'], $allowed_words_array_trimmed);
            ////////////////////////////////////////////////////////////////////////////////////////////

            ////////////////////////////////////////////////////////////////////////////////////////////
            if($blocked_usernames !=''){
                $blocked_usernames_array = explode( ',', $blocked_usernames );
            }else{
                $blocked_usernames_array = array();
            }
            $blocked_usernames_array_trimmed = array_map('trim', $blocked_usernames_array );

            $block_username = IF_Pro_Class:: contains($vm['nickname'], $blocked_usernames_array_trimmed);
            
            ////////////////////////////////////////////////////////////////////////////////////////////
            if($allowed_usernames !=''){
                $allowed_usernames_array = explode( ',', $allowed_usernames );
            }else{
                $allowed_usernames_array = array();
            }

            $allowed_usernames_array_trimmed = array_map('trim', $allowed_usernames_array );

            $allow_username = IF_Pro_Class:: contains($vm['nickname'], $allowed_usernames_array_trimmed);
            ////////////////////////////////////////////////////////////////////////////////////////////
            

            if($block_word == TRUE && $blocked_image_caption_words!=''){
                continue;
            }else if($allow_word != TRUE && $allowed_image_caption_words !=''){
                continue;
            }if($block_username == TRUE && $blocked_username!=''){
                continue;
            }else if($allow_username != TRUE && $allowed_username !=''){
                continue;
            }else{
               $filtered_array[$i++] = $vm;
            }
           }
          $new_filtered_array = $filtered_array;
          return $new_filtered_array;
        }else{
          return $feeds_arr;
        }
}
   
   /*
   *Object Data to Array Conversion
   */
    public function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }
        
        if (is_array($d)) {
            /*
            * Return array converted to object
            * if the function is member of a class you must change __FUNCTION__ to __METHOD__
            * Using __FUNCTION__ (Magic constant)
            * for recursive call
            */
            return array_map(__METHOD__, $d);
        }
        else {
            // Return array
            return $d;
        }
    }

    function get_username_feeds($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words){
        static  $filtered_array = array(), $counter_run = 0;
                $json = self::get_remote_data_from_instagram_in_json( $url );
                $data = $json;
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                //echo $any_user_username_blocked_caption_words;

                if(isset($data['data'])){
                    $ins_links=array();
                    $page=isset($data['pagination']) ? $data['pagination'] : array();
                    $dataarray=$data['data'];
                    $datacount=count($dataarray);
                    $pagination_id = '';
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    foreach( $data['data'] as $vm ){
                        if($i<$count){
                            if( ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ){
                                ////////////////////////////////////////////////////////////////////////////////
                                $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                                if($blocked_words !=''){
                                    $blocked_words_array = explode( ',', $blocked_words );
                                }else{
                                    $blocked_words_array = array();
                                }
                                $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                                $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////

                                ///////////////////////////////////////////////////////////////////////////////////
                                $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                                if($allowed_words !=''){
                                    $allowed_words_array = explode( ',', $allowed_words );
                                }else{
                                    $allowed_words_array = array();
                                }

                                $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                                $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////////
                                if($block == TRUE ){
                                    continue;
                                }else if($allow != TRUE ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] =$vm;
                                    $pagination_id = $vm['id'];
                                }
                            }else if ((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words =='')){
                                ////////////////////////////////////////////////////////////////////////////////
                                $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                                if($blocked_words !=''){
                                    $blocked_words_array = explode( ',', $blocked_words );
                                }else{
                                    $blocked_words_array = array();
                                }
                                $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );
                                $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////
                                if($block == true ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] =$vm;
                                    $pagination_id = $vm['id'];
                                }
                            }else if((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words =='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='')){
                                ///////////////////////////////////////////////////////////////////////////////////
                                $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                                if($allowed_words !=''){
                                    $allowed_words_array = explode( ',', $allowed_words );
                                }else{
                                    $allowed_words_array = array();
                                }
                                $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );
                                $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                                ///////////////////////////////////////////////////////////////////////////////////////
                                if($allow != TRUE ){
                                    continue;
                                }else{
                                    $filtered_array[$i++] =$vm;
                                    $pagination_id = $vm['id'];
                                }
                            }else{
                                $filtered_array[$i++] = $vm;
                                $pagination_id = $vm['id'];
                            }
                        }else{

                        }
                    }
                    if($i<$count){
                        if($counter_run <10){
                            $counter_run++;
                            if(isset($page['next_url'])){
                                return self::get_username_feeds($page['next_url'],$i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words);
                            }else{
                                $new_filtered_array['data'] = $filtered_array;
                                $new_filtered_array['pagination'] = array();
                                return $new_filtered_array;
                            }
                        }else{
                            $new_filtered_array['data'] = $filtered_array;
                            $new_filtered_array['pagination'] = array();
                            return $new_filtered_array;
                        }
                    }else{
                        $new_filtered_array['data']= $filtered_array;
                        if(isset($page['next_url'])){
                            $result = explode('max_id=', $page['next_url']);
                            $next_url = $result[0].'max_id='.$pagination_id;
                            $new_filtered_array['pagination']['next_url'] = $next_url;
                        }
                        return $new_filtered_array;
                        // continue;
                    }
                }else{
                    return $data;
                }
    }

    //function to get the user's instagram feeds
    function userFeed( $count )
    {
        $url = 'https://api.instagram.com/v1/users/self/feed?access_token=' . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }
    
    function get_remote_data_from_instagram_in_json( $url )
    {
        $content = wp_remote_get( $url );
        if( isset( $content->errors ) )
        {
            $content = json_encode(array('meta'=>array('error_message'=>$content->errors['http_request_failed']['0'])));
            $content = json_decode($content, true);
            return $content;
        }
        else
        {
            $response = wp_remote_retrieve_body( $content );
            $json = json_decode( $response, true );
            return $json;
        }
    }
    //function to get the recent media liked by user
    function userLiked( $count )
    {
        $url = 'https://api.instagram.com/v1/users/self/media/liked?access_token=' . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }

    function getFilteredUserLiked ( $url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words, $blocked_username_words, $allowed_username_words ){
        static  $filtered_array = array(), $counter_run = 0;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        $data = $json;
        if(isset($data['data'])){
            $ins_links=array();
            $page=$data['pagination'];
            $dataarray=$data['data'];
            $datacount=count($dataarray);
            $pagination_id = '';

            foreach( $data['data'] as $vm ){
                if($i<$count){
                    $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    $allowed_usernames = ( isset($allowed_username_words) && $allowed_username_words!='' ) ? $allowed_username_words : '';
                    $blocked_usernames = ( isset($blocked_username_words) && $blocked_username_words!='' ) ? $blocked_username_words : '';

                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($blocked_words !=''){
                        $blocked_words_array = explode( ',', $blocked_words );
                    }else{
                        $blocked_words_array = array();
                    }
                    $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                    $block_word = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($allowed_words !=''){
                        $allowed_words_array = explode( ',', $allowed_words );
                    }else{
                        $allowed_words_array = array();
                    }

                    $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                    $allow_word = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    ////////////////////////////////////////////////////////////////////////////////////////////

                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($blocked_usernames !=''){
                        $blocked_usernames_array = explode( ',', $blocked_usernames );
                    }else{
                        $blocked_usernames_array = array();
                    }
                    $blocked_usernames_array_trimmed = array_map('trim', $blocked_usernames_array );

                    $block_username = IF_Pro_Class:: contains($vm['user']['username'], $blocked_usernames_array_trimmed);
                    
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($allowed_usernames !=''){
                        $allowed_usernames_array = explode( ',', $allowed_usernames );
                    }else{
                        $allowed_usernames_array = array();
                    }

                    $allowed_usernames_array_trimmed = array_map('trim', $allowed_usernames_array );

                    $allow_username = IF_Pro_Class:: contains($vm['user']['username'], $allowed_usernames_array_trimmed);
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    

                    if($block_word == TRUE && $any_user_username_blocked_caption_words!=''){
                        continue;
                    }else if($allow_word != TRUE && $any_user_username_allowed_caption_words !=''){
                        continue;
                    }if($block_username == TRUE && $blocked_username_words!=''){
                        continue;
                    }else if($allow_username != TRUE && $allowed_username_words !=''){
                        continue;
                    }else{
                        $filtered_array[$i++] =$vm;
                        $pagination_id = $vm['id'];
                    }
                    
                    // if( ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ){
                    //     ////////////////////////////////////////////////////////////////////////////////
                    //     $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    //     if($blocked_words !=''){
                    //         $blocked_words_array = explode( ',', $blocked_words );
                    //     }else{
                    //         $blocked_words_array = array();
                    //     }
                    //     $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                    //     $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////

                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    //     if($allowed_words !=''){
                    //         $allowed_words_array = explode( ',', $allowed_words );
                    //     }else{
                    //         $allowed_words_array = array();
                    //     }

                    //     $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                    //     $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////////
                    //     if($block == TRUE ){
                    //         continue;
                    //     }else if($allow != TRUE ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else if ((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words =='')){
                    //     ////////////////////////////////////////////////////////////////////////////////
                    //     $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    //     if($blocked_words !=''){
                    //         $blocked_words_array = explode( ',', $blocked_words );
                    //     }else{
                    //         $blocked_words_array = array();
                    //     }
                    //     $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );
                    //     $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     if($block == true ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else if((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words =='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='')){
                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    //     if($allowed_words !=''){
                    //         $allowed_words_array = explode( ',', $allowed_words );
                    //     }else{
                    //         $allowed_words_array = array();
                    //     }
                    //     $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );
                    //     $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////////
                    //     if($allow != TRUE ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else{
                    //     $filtered_array[$i++] = $vm;
                    //     $pagination_id = $vm['id'];
                    // }
                }else{

                }
            }
            if($i<$count){
                if($counter_run <10){
                    $counter_run++;
                    if(isset($page['next_url'])){
                        return self::getFilteredUserLiked($page['next_url'],$i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words, $blocked_username_words, $allowed_username_words);
                    }else{
                        $new_filtered_array['data'] = $filtered_array;
                        $new_filtered_array['pagination'] = array();
                        return $new_filtered_array;
                    }
                    
                }else{
                    $new_filtered_array['data'] = $filtered_array;
                    $new_filtered_array['pagination'] = array();
                    return $new_filtered_array;
                }
            }else{
                $new_filtered_array['data']= $filtered_array;
                if(isset($page['next_url'])){
                    $result = explode('max_like_id=', $page['next_url']);
                    $next_url = $result[0].'max_like_id='.$pagination_id;
                    $new_filtered_array['pagination']['next_url'] = $next_url;
                }
                return $new_filtered_array;
                // continue;
            }
        }else{
            return $data;
        }
    }

    //function to get the user's instagram feeds using ajax
    function ajaxuserFeed( $url )
    {
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }
    //function that Gets a list of what media is most popular at the moment. Can return mix of image and video types.
    function instagramPopular( $count )
    {
        $url = 'https://api.instagram.com/v1/media/popular?access_token=' . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }
    /*
    *  function to get the recent comment of the specified media object.  
    *   @param integer $media_id Media ID
    */
    function getComments( $media_id )
    {
        $url = "https://api.instagram.com/v1/media/{$media_id}/comments?access_token=" . $this->access_token;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }
    
    /*
    * Display the comments of provided data from instagram
    * @param string $media_comments Media comments
    * @param string $limit limit the comments count
    */
    static function displayComments( $media_comments, $limit )
    {
        $i = 1;
        echo "<div class='apif-comments'>";
        foreach( $media_comments['data'] as $comments )
        {
            echo "<div class='apif-each-comment'>";
            echo "<div class='apif-user-link'>";
            echo "<a href='https://instagram.com/{$comments['from']['username']}' target='_blank'>{$comments['from']['username']}</a>";
            echo "</div>";
            
            echo "<div class='apif-comment-text'>";
            echo $comments['text'];
            echo "</div>";
            
            echo "</div>";
            if( $i++ >= $limit )break;
        }
        echo "</div>";
    }
    
    /*
    * Get the tag info
    * @param string $tag_name Tag name 
    */
    function getTagInfo( $tag_name )
    {
        $url = "https://api.instagram.com/v1/tags/{$tag_name}?access_token=" . $this->access_token;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }


    /*
    *   Get recent media of specified tag
    *   @param string $tag_name Tag name
    *   @param string $count Count
    */
    function getTagRecentMedia( $tag_name, $count )
    {
        $url = "https://api.instagram.com/v1/tags/{$tag_name}/media/recent?access_token=" . $this->access_token . '&count=' . $count;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        return $json;
    }

    /**
    * Get the filtered media of specific tag
    */
    function getFilteredTagRecentMedia($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words, $blocked_username_words, $allowed_username_words ){
        static  $filtered_array = array(), $counter_run = 0;
        $json = self::get_remote_data_from_instagram_in_json( $url );
        $data = $json;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        if(isset($data['data'])){
            $ins_links=array();
            $page=$data['pagination'];
            $dataarray=$data['data'];
            $datacount=count($dataarray);
            $pagination_id = '';

            // echo "<pre>";
            // print_r($data['data']);
            // echo "</pre>";
            foreach( $data['data'] as $vm ){
                if($i<$count){

                    $allowed_words =(isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    // $allowed_username_words = '';
                    // $blocked_username_words = 'kirstin_wende, exclusive_store22, kunlin850425';
                    $allowed_usernames = ( isset($allowed_username_words) && $allowed_username_words!='' ) ? $allowed_username_words : '';
                    $blocked_usernames = ( isset($blocked_username_words) && $blocked_username_words!='' ) ? $blocked_username_words : '';
                    
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($blocked_words !=''){
                        $blocked_words_array = explode( ',', $blocked_words );
                    }else{
                        $blocked_words_array = array();
                    }
                    $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                    $block_word = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($allowed_words !=''){
                        $allowed_words_array = explode( ',', $allowed_words );
                    }else{
                        $allowed_words_array = array();
                    }

                    $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                    $allow_word = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    ////////////////////////////////////////////////////////////////////////////////////////////

                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($blocked_usernames !=''){
                        $blocked_usernames_array = explode( ',', $blocked_usernames );
                    }else{
                        $blocked_usernames_array = array();
                    }
                    $blocked_usernames_array_trimmed = array_map('trim', $blocked_usernames_array );

                    $block_username = IF_Pro_Class:: contains($vm['user']['username'], $blocked_usernames_array_trimmed);
                    
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    if($allowed_usernames !=''){
                        $allowed_usernames_array = explode( ',', $allowed_usernames );
                    }else{
                        $allowed_usernames_array = array();
                    }

                    $allowed_usernames_array_trimmed = array_map('trim', $allowed_usernames_array );

                    $allow_username = IF_Pro_Class:: contains($vm['user']['username'], $allowed_usernames_array_trimmed);
                    ////////////////////////////////////////////////////////////////////////////////////////////
                    

                    if($block_word == TRUE && $any_user_username_blocked_caption_words!=''){
                        continue;
                    }else if($allow_word != TRUE && $any_user_username_allowed_caption_words !=''){
                        continue;
                    }if($block_username == TRUE && $blocked_username_words!=''){
                        continue;
                    }else if($allow_username != TRUE && $allowed_username_words !=''){
                        continue;
                    }else{
                        $filtered_array[$i++] =$vm;
                        $pagination_id = $vm['id'];
                    }


                    // if( ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ){
                    //     ////////////////////////////////////////////////////////////////////////////////
                    //     $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    //     if($blocked_words !=''){
                    //         $blocked_words_array = explode( ',', $blocked_words );
                    //     }else{
                    //         $blocked_words_array = array();
                    //     }
                    //     $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );

                    //     $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////

                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    //     if($allowed_words !=''){
                    //         $allowed_words_array = explode( ',', $allowed_words );
                    //     }else{
                    //         $allowed_words_array = array();
                    //     }

                    //     $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );

                    //     $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////////
                    //     if($block == TRUE ){
                    //         continue;
                    //     }else if($allow != TRUE ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else if ((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words =='')){
                    //     ////////////////////////////////////////////////////////////////////////////////
                    //     $blocked_words = ( isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words!='' ) ? $any_user_username_blocked_caption_words : '';
                    //     if($blocked_words !=''){
                    //         $blocked_words_array = explode( ',', $blocked_words );
                    //     }else{
                    //         $blocked_words_array = array();
                    //     }
                    //     $blocked_words_array_trimmed = array_map('trim', $blocked_words_array );
                    //     $block = IF_Pro_Class:: contains($vm['caption']['text'], $blocked_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     if($block == true ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else if((isset($any_user_username_blocked_caption_words) && $any_user_username_blocked_caption_words =='' ) && (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='')){
                    //     ///////////////////////////////////////////////////////////////////////////////////
                    //     $allowed_words = (isset($any_user_username_allowed_caption_words) && $any_user_username_allowed_caption_words !='') ? $any_user_username_allowed_caption_words : '';
                    //     if($allowed_words !=''){
                    //         $allowed_words_array = explode( ',', $allowed_words );
                    //     }else{
                    //         $allowed_words_array = array();
                    //     }
                    //     $allowed_words_array_trimmed = array_map('trim', $allowed_words_array );
                    //     $allow = IF_Pro_Class:: contains($vm['caption']['text'], $allowed_words_array_trimmed);
                    //     ///////////////////////////////////////////////////////////////////////////////////////
                    //     if($allow != TRUE ){
                    //         continue;
                    //     }else{
                    //         $filtered_array[$i++] =$vm;
                    //         $pagination_id = $vm['id'];
                    //     }
                    // }else{
                    //     $filtered_array[$i++] = $vm;
                    //     $pagination_id = $vm['id'];
                    // }
                }else{

                }
            }
            if($i<$count){
                if($counter_run <10){
                    $counter_run++;
                    if(isset($page['next_url'])){
                        return self::getFilteredTagRecentMedia($page['next_url'],$i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words, $blocked_username_words, $allowed_username_words);
                    }else{
                        $new_filtered_array['data'] = $filtered_array;
                        $new_filtered_array['pagination'] = array();
                        return $new_filtered_array;
                    }
                    
                }else {
                    $new_filtered_array['data'] = $filtered_array;
                    $new_filtered_array['pagination'] = array();
                    return $new_filtered_array;
                }
            }else{
                $new_filtered_array['data']= $filtered_array;
                if(isset($page['next_url'])){
                    // $result = explode('max_tag_id=', $page['next_url']);
                    // $next_url = $result[0].'max_tag_id='.$page['next_max_id'];
                    $new_filtered_array['pagination']['next_url'] = $page['next_url'];
                }
                return $new_filtered_array;
                // continue;
            }
        }else{
            return $data;
        }

    }

    /**
     * retrive user info
     * @return json string
     */
    function userInfo(){
        $username = $this->username;
        $url = 'https://api.instagram.com/v1/users/self/?access_token=' . $this->access_token;
        $json = self:: get_remote_data_from_instagram_in_json( $url );
        return $json;
    }
}
