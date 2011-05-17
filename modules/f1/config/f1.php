<?php

/**
 * F1 Church codes for 2nd party
 */

return array(
	'base_url' => 'https://{MyChurchCode}.staging.fellowshiponeapi.com',
	'consumer_key' => '', // change index to "key" for kohana oauth when done
	'consumer_secret' => '', // change index to "secret" for kohana oauth when done
	'requesttoken_path' => '/v1/Tokens/RequestToken',
	'accesstoken_path' => '/v1/PortalUser/AccessToken',
	'auth_path' => '/v1/PortalUser/Login',
	'callbackURI' => 'http://www.yourdomain.com/callback.php',
	'set_content_type' => array('Accept: application/json', 'Content-type: application/json'),
);

?>