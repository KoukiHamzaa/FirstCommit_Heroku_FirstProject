<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
if(!empty($unserialized_uab_profile_data[$key]['uab_facebook_id']) && !empty($unserialized_uab_profile_data[$key]['uab_facebook_token'])){
	//echo 'Session ID is '. session_id(). '<br/>';
	require_once UAB_PATH . '/FacebookFeed/Facebook/autoload.php';
	//echo 'APP ID is '.$unserialized_uab_profile_data[$key]['uab_facebook_id']. '<br/>';
	//echo 'APP Secret is '.$unserialized_uab_profile_data[$key]['uab_facebook_token']. '<br/>';
	$tabKey = $key;
	$fb_id = isset($unserialized_uab_profile_data[$key]['uab_facebook_userid'])?$unserialized_uab_profile_data[$key]['uab_facebook_userid']:'me';
	$fb_count = isset($unserialized_uab_profile_data[$key]['uab_facebook_feed_number'])?$unserialized_uab_profile_data[$key]['uab_facebook_feed_number']:'1';
	/*/me?fields=name,link
	/1444958614?fields=name,link
	/me/picture?redirect=false&height=100
	/1444958614/picture?redirect=false&height=100
	me/posts?fields=created_time,story,link,message,likes.summary(true),comments.summary(true)&limit=1*/
	//echo '/'.$fb_id.'/posts?fields=created_time,story,link,message,likes.summary(true),comments.summary(true)&limit=5'.$fb_count;

	$fb = new Facebook\Facebook([
		'app_id' => $unserialized_uab_profile_data[$key]['uab_facebook_id'],
		'app_secret' => $unserialized_uab_profile_data[$key]['uab_facebook_token'],
		'default_graph_version' => 'v2.8',
		]);

	$permissions = ['email','user_posts','publish_actions','manage_pages']; 

	$admin_url = $unserialized_uab_profile_data[$key]['admin_url'];
	$helper = $fb->getRedirectLoginHelper();
	$loginUrl = $helper->getLoginUrl($admin_url, $permissions);
		?>
	<div class="fb-authorize">
		<a href="<?php echo htmlspecialchars($loginUrl) ;?>">Fetch Facebook Feeds</a>
	</div><?php
	try {
		if (isset($_SESSION[$tabKey])) {
			$accessToken = $_SESSION[$tabKey];
		} else {
			$accessToken = $helper->getAccessToken();
		}
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();

		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	//var_dump($accessToken);

	if (isset($accessToken)) {
		if (isset($_SESSION[$tabKey])) {
			$fb->setDefaultAccessToken($_SESSION[$tabKey]);
		} else {
			// getting short-lived access token
			$_SESSION[$tabKey] = (string) $accessToken;

			// OAuth 2.0 client handler
			$oAuth2Client = $fb->getOAuth2Client();

			// Exchanges a short-lived access token for a long-lived one
			$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION[$tabKey]);

			$_SESSION[$tabKey] = (string) $longLivedAccessToken;

			// setting default access token to be used in script
			$fb->setDefaultAccessToken($_SESSION[$tabKey]);
		}

			// validating the access token
		try {
			$request = $fb->get('/me');
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			if ($e->getCode() == 190) {
				unset($_SESSION[$tabKey]);
				$helper = $fb->getRedirectLoginHelper();
				$loginUrl = $helper->getLoginUrl($admin_url, $permissions);
				echo "<script>window.top.location.href='".$loginUrl."'</script>";
			}
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		// redirect the user back to the same page if it has "code" GET variable
		if (isset($_GET['code'])) {
			//header('Location: ./profile.php');
		}

		// getting declined and granted permissions
		$permissions = $fb->get('/me/permissions');
		$permissions = $permissions->getGraphEdge()->asArray();

		// making new login URL with declined permissions attached to it
		foreach ($permissions as $key) {
			if ($key['status'] == 'declined') {
				$declined[] = $key['permission'];
				$loginUrl = $helper->getLoginUrl('http://localhost/ap-author-box-pro/wp-admin/profile.php', $declined);
				echo '<a href="' . $loginUrl . '">Authorize Facebook App</a>';
			}
		}

		// getting basic info about user
		try {
			$profile_request = $fb->get('/'.$fb_id.'?fields=name,link');
			$profile = $profile_request->getGraphNode()->asArray();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			session_destroy();
			// redirecting user back to app login page
			header("Location: ./");
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}
		$profile_name= (string) $profile['name'];
		$profile_link= (string) $profile['link'];
		?>
		<input type="hidden" name="uab_profile_data[<?php esc_attr_e($tabKey);?>][uab_fb_name]" value="<?php echo (isset( $unserialized_uab_profile_data[$tabKey]['uab_fb_name'] )) ? esc_attr( $unserialized_uab_profile_data[$tabKey]['uab_fb_name'] ) : $profile_name; ?>">
		<input type="hidden" name="uab_profile_data[<?php esc_attr_e($tabKey);?>][uab_fb_link]" value="<?php echo (isset( $unserialized_uab_profile_data[$tabKey]['uab_fb_link'] )) ? esc_attr( $unserialized_uab_profile_data[$tabKey]['uab_fb_link'] ) : $profile_link; ?>">
		<?php
		// getting profile picture of the user
		try {
			$requestPicture = $fb->get('/'.$fb_id.'/picture?redirect=false&height=100'); 
			//getting user picture
			$picture = $requestPicture->getGraphUser();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		$profile_image = (string) $picture['url'];?>
		<input type="hidden" name="uab_profile_data[<?php esc_attr_e($tabKey);?>][uab_fb_image]" value="<?php echo (isset( $unserialized_uab_profile_data[$tabKey]['uab_fb_image'] )) ? esc_attr( $unserialized_uab_profile_data[$tabKey]['uab_fb_image'] ) : $profile_image; ?>"><?php

		// getting all posts published by user
		try {
			$posts_request = $fb->get('/'.$fb_id.'/posts?fields=created_time,story,link,message,likes.summary(true),comments.summary(true)&limit=10');
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		$total_posts = array();
		$posts_response = $posts_request->getGraphEdge();
		if($fb->next($posts_response)) {
			$response_array = $posts_response->asArray();
			$total_posts = array_merge($total_posts, $response_array);
			// while ($posts_response = $fb->next($posts_response)) {	
			// 	$response_array = $posts_response->asArray();
			// 	$total_posts = array_merge($total_posts, $response_array);	
			// }
			//$this->print_array($total_posts);
			esc_html_e('Facebook Feeds Fetched Successfully!','ultimate-author-box');
			$user_id = $user->ID;
			update_user_meta( $user_id, 'uab_facebook_feeds', $total_posts);
		} else {
			$posts_response = $posts_request->getGraphEdge()->asArray();
		}	
	}

}