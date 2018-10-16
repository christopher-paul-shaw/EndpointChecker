<?php
namespace CPS;
use Exception;

class EndpointChecker {
	
	public function __construct () {

	}

	public function getStatus($url) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, true); 
		curl_setopt($ch, CURLOPT_NOBODY, true); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT,10);
		$output = curl_exec($ch);
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return $code;
	}

	public function process ($payload) {
		if (!is_array($payload)) {
			throw new Exception("Input needs to be an array");
		}

		foreach ($payload as $i => $p) {
			$result = $this->getStatus($p['url']);
			$payload[$i]['status'] = $result;
		}

		return $payload;
	}

}
