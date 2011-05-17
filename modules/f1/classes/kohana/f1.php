<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_F1
{
	
	public $request_url, $request_body, $content_type, $f1_config;
	
	private $password;
	
	public function __construct()
	{
		/**
		 * CHANGED: Require files on load of class
		 * load, oauth library, utility and signer
		 */
		require_once Kohana::find_file('vendor', 'f1/f1_oauth');
		require_once Kohana::find_file('vendor', 'f1/f1_util');
		require_once Kohana::find_file('vendor', 'f1/f1_signer');
	}
	
	public function before()
	{
		// Load nothing for now
	}
	
	public function action_index()
	{
		echo 'test';
	}
	
	public function authenticate_user($email, $password)
	{
		// Separate domain from username for authenticating			
		$explode_user_name = explode('@', $email);
		$user_name = trim($explode_user_name[0]);
		
		$this->f1_config = Kohana::config('f1');
		
		// Concatenate url string for request url
		$this->request_url = $this->f1_config['base_url'] . $this->f1_config['accesstoken_path'];
		
		// Create request body per f1 documentation and examples
		$this->request_body = rawurlencode(base64_encode($user_name . ' ' . $password));
		$this->request_body = str_replace('%7E', '~', $this->request_body);
		$this->request_body = str_replace('+', ' ', $this->request_body);
		
		// Set content type to json
		$content_type = $this->f1_config['set_content_type'];
		
		$api_consumer = new F1_Oauth($this->f1_config['base_url'], $this->f1_config['consumer_key'], $this->f1_config['consumer_secret']);
		
		$request_body = $api_consumer->postRequest($this->request_url, $this->request_body , $content_type,  200);
		
		// Get tokens and token secret
		preg_match( "~oauth_token\=([^\&]+)\&oauth_token_secret\=([^\&]+)~i", $request_body, $tokens );
		
		if( !isset( $tokens[1] ) || !isset( $tokens[2] ) ) {
			
			/**
			 * TODO: Change to view and notify website admin
			 */
			// Get response headers
			$response_headers = $api_consumer->getResponseHeader();
			throw new Exception('Username and/or Password invalid');
		
		} else {
			$access_token = $tokens[1];
			$token_secret = $tokens[2];
			
			// Load access_token and token_secret in session
			$api_consumer->initAccessToken($access_token, $token_secret);
			
			// Get response headers
			$response_headers = $api_consumer->getResponseHeader();
			
			// Get person link to retreive person object
			foreach($response_headers as $val) {
				
				// Get the needle in the haystack
				$needle = 'Content-Location: ';
				
				// Find the position
				$pos = strpos($val, $needle);
				
				// If haystack has needle set to true
				if($pos !== false) {
					$person_location = str_replace($needle, '', $val);					
				}
			}
			
			$person = $api_consumer->doRequest($person_location, $content_type);
			
			$person = json_decode($person, TRUE);
			//$person = $person
			var_dump($person);
			
		}
		
	}
	
	public function after()
	{
		// Nothing in after for now
	}
}