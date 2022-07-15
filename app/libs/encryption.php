<?php

class Encryption 
{
	public function encrypt($val)
	{
		$array = str_split($val,1);
		$val='';

		for($x=0;$x<=sizeof($array)-1;$x++){
			$val .= " " . decbin((ord($array[$x]) + 15));
		}
		$val = base64_encode($val);
	
		return $val;
	}
	public function decrypt($val)
	{
		$val = base64_decode($val);
		$array = explode(' ',$val);
		$val = '';
		
		for($x=1;$x<=sizeof($array)-1;$x++){
			$val .=chr((bindec($array[$x]))-15);	
		}
	
		return $val;
	}
	public function advance_encrypt($val) {
		$array = str_split($val,1);
		$val='';

		for($x=0;$x<=sizeof($array)-1;$x++){
			$val .= " " . decbin((ord($array[$x]) + 15));
		}
		$val = base64_encode($val);
	
		return $val;
	}
	public function advance_decrypt($val) {
		$val = base64_decode($val);
		$array = explode(' ',$val);
		$val = '';
		
		for($x=1;$x<=sizeof($array)-1;$x++){
			$val .=chr((bindec($array[$x]))-15);	
		}
	
		return $val;	
	}
	/////////////////////////////////////////////////////
	///               FOR FUTURE USE                  ///
	/// ////////////////////////////////////////////////
	public function a_advance_encrypt($plaintext) {//rename this
		$key = openssl_digest("0ct4n3tR4ck3r2021!", "sha256",true);
		$cipher = "aes-256-ctr";

		$ivlen = openssl_cipher_iv_length($cipher);
		$iv = openssl_random_pseudo_bytes($ivlen);

		$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
		$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
		$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

		return $ciphertext;
	}
	public function a_advance_decrypt($ciphertext) {//rename this

		$decode = base64_decode($ciphertext);
		$key = openssl_digest("0ct4n3tR4ck3r2021!", "sha256", true);
		$cipher = "aes-256-ctr";

		$ivlen = openssl_cipher_iv_length($cipher);
		$iv = substr($decode, 0, $ivlen);
		$hmac = substr($decode, $ivlen, $sha2len=32);

		$ciphertext_raw = substr($decode, $ivlen+$sha2len);
		$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
		$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);

		if (hash_equals($hmac, $calcmac)){
		    return $original_plaintext;
		}
	}
}