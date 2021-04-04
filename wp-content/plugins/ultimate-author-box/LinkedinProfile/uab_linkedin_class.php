<?php
defined('ABSPATH') or die('No scritps for you');
if (!class_exists('Ultimate_Linkedin_Class')) {
	/**
	 * Ultimate Linkedin Admin Sections
	 */
	class Ultimate_Linkedin_Class
	{
		
		function __construct()
		{
			add_action('template_redirect',array($this,'ulimgmt_template_redirect'));
			define('LINKEDIN_FIELDS_BASIC', 'id, first-name, last-name, picture-url, headline, location, industry, public-profile-url');
			define('LINKEDIN_FIELDS_DEFAULT', 'summary, positions');
			add_shortcode('uab_linkedin_profile',array($this,'linkedin_profile'));
		}

		public function ulimgmt_template_redirect()
		{
			if (isset($_GET['code']) && isset($_GET['r']) && isset($_GET['state'])) {
				if ($this->get_state_token() == $_GET['state']) {
					$this->process_authorization($_GET['code'],$_GET['state'],$_GET['r']);
				}
			}
		}
		
		public function get_state_token() {
			$time = intval(time() / 172800);
			$salt = (defined('NONCE_SALT')) ? NONCE_SALT : SECRET_KEY;
			return sha1('linkedin-oauth' . $salt . $time);
		}

		public function process_authorization($code, $state, $redirect_uri=false) {
			if (is_user_logged_in()) {
				$author_id = $this->get_user_id_by_redirect($redirect_uri);
				if (isset($_REQUEST['error'])) {
					$error = $_REQUEST['error'];
					$error_description = $_REQUEST['error_description'];
					wp_redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $redirect_uri . '&message=failedAuth');
				} elseif ($this->get_state_token() == $state) {
					$retcode = $this->set_access_token($code , $author_id, $redirect_uri);
					if (!is_wp_error($retcode)) {
						update_user_meta( $author_id, 'uab_linkedin_access_token', $retcode );
						wp_redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $redirect_uri . "&message=success");
					} else {
						$this->print_array($retcode);
						// wp_redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $redirect_uri . '&message=failedAccess');
					}
				} else {
					wp_redirect($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $redirect_uri . '&message=stateInvalid');
				}
			} else {
				wp_redirect(wp_login_url($_SERVER['REQUEST_URI']));
			}
		}
		
		public function set_access_token($code ,$author_id , $redirect_uri=false) {
			$response = $this->retrieve_access_token($code , $author_id , $redirect_uri);

			if (!is_wp_error($response)) {
				return $response->access_token .'_expires_' . $response->expires_in;
			} else {
				return $response;
			}
		}

		public function retrieve_access_token($code , $author_id , $redirect_uri=false) {
			$redirect_uri = $this->get_token_process_url($redirect_uri);
			$client_id = $this->get_client_id($author_id);
			$secret_id = $this->get_secret_id($author_id);

			$url = 'https://www.linkedin.com/oauth/v2/accessToken';
			$params = array(
					'grant_type' => 'authorization_code',
					'code' => $code,
					'redirect_uri' => $redirect_uri,
					'client_id' => $client_id,
					'client_secret' => $secret_id
				);

			$response = wp_remote_get($url, array('sslverify' => 1, 'body' => $params));
			if (!is_wp_error($response)) {
				$body = json_decode($response['body']);

				if (isset($body->access_token)) {
					return $body;
				} elseif (isset($body->error)) {
					$error = $body->error;
					$error_description = $body->error_description;
					return new WP_Error('retrieve_access_token', "$error_description ($error)");
				} else {
					return new WP_Error('retrieve_access_token', __('An unknown error has occured and no token was retrieved.', 'wp-linkedin'));
				}
			} else {
				return $response;
			}
		}
		
		public function get_token_process_url($r=false) {
			$query = array();
			$rules = get_option('rewrite_rules');

			if (is_array($rules) and !empty($rules)) {
				// we have rewrite rules activated
				$url = home_url('/oauth/linkedin/');
			} else {
				$url = home_url();
				$query['oauth'] = 'linkedin';
			}

			if ($r) {
				// cleanup the url, remove args specified below
				$removable_query_args = array(
				        'message', 'settings-updated', 'saved',
				        'update', 'updated', 'activated',
				        'activate', 'deactivate', 'locked',
				        'deleted', 'trashed', 'untrashed',
				        'enabled', 'disabled', 'skipped',
				        'spammed', 'unspammed',
				    );
				$removable_query_args = apply_filters('removable_query_args', $removable_query_args);

				$r = remove_query_arg($removable_query_args, $r);
				$query['r'] = $r;
			}

			if (!empty($query)) {
				$url .= '?' . http_build_query($query);
			}

			return $url;
		}
		public function linkedin_profile($atts='', $content='')
		{
			extract($atts);
			$fields = LINKEDIN_FIELDS_DEFAULT;
			$lang = '';
			$fields = preg_replace('/\s+/', '', LINKEDIN_FIELDS_BASIC . ',' . $fields);
			$json_data = $this->wp_linkedin_get_profile($fields, $lang, $user_id);
			update_user_meta($user_id,'uab_linkedin_profile_data',$json_data);
		}

		function wp_linkedin_get_profile($options='id', $lang=LINKEDIN_PROFILELANGUAGE,$user_id) {
			$response = $this->get_profile($options, $lang,$user_id);
			if (!isset($response->errors)) {
				return $response;
			}
		}

		public function get_profile($options='id', $lang='',$user_id) {
				// Not cached or expired? Let's try to fetch one.
				$url = "https://api.linkedin.com/v1/people/~:($options)";
				$profile = $this->api_call($url, $lang,$user_id);
				return $profile;
		}

		public function api_call($url, $lang='',$user_id, $params=false) {
		$access_token_store = explode('_expires_', get_the_author_meta('uab_linkedin_access_token',$user_id));
		$access_token = $access_token_store[0];

			if ($access_token) {
				if (!is_array($params)) $params = array();
				$params['oauth2_access_token'] = $access_token;
				$url .= '?' . http_build_query($params, '', '&');

				$headers = array(
						'Content-Type' => 'text/plain; charset=UTF-8',
						'x-li-format' => 'json');

				if (!empty($lang)) {
					$headers['Accept-Language'] = str_replace('_', '-', $lang);
				}

				$response = wp_remote_get($url, array('sslverify' => 1, 'headers' => $headers));
				if (!is_wp_error($response)) {
					$return_code = $response['response']['code'];
					$body = json_decode($response['body']);

					if ($return_code == 200) {
						return $response['body'];
						return $body;
					} else{
						if ($return_code == 401) {
							// Invalidate token
							return 'Invalid token';
						}

						if (isset($body->message)) {
							$error = new WP_Error('api_call', $body->message);
						} else {
							$error = new WP_Error('api_call', sprintf(__('HTTP request returned error code %d.', 'wp-linkedin'), $return_code));
						}
						return $error;
					}
				} else {
					return new WP_Error('api_call', $response->get_error_message());
				}
			} else {
				return new WP_Error('api_call', __('No token or token has expired.', 'wp-linkedin'));
			}
		}

		function print_array($data){
			echo "<pre>";
			print_r($data);
			echo "</pre>";
		}

		function get_user_id_by_redirect($string_value){
			$update_2 = explode('user_id=', $string_value);
			$update_3 = $update_2[1];
			return $update_3;
		}

		public function get_client_id($author_id)
		{
			return get_the_author_meta('uab_linkedin_client_id',$author_id);
		}

		public function get_secret_id($author_id)
		{
			return get_the_author_meta('uab_linkedin_secret_id',$author_id);
		}

	}
	new Ultimate_Linkedin_Class();
}