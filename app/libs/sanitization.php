<?php 

class Sanitization{
	// Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[]
	function email($valid_email){
		$clean_email = filter_var($valid_email, FILTER_SANITIZE_EMAIL);
		return $clean_email;
	}
	// URL-encode string, optionally strip or encode special characters.
	function urlEncode($url){
		// $sanitizedUrl = filter_var($url, FILTER_SANITIZE_ENCODED);

		// Encode characters and remove all characters with ASCII value > 127
		$sanitizedUrl = filter_var($url, FILTER_SANITIZE_ENCODED, FILTER_FLAG_STRIP_HIGH);
		return $sanitizedUrl;
	}
	// Apply addslashes().
	function magicQuotes($str){
		$sanitizedStr = filter_var($str, FILTER_SANITIZE_MAGIC_QUOTES);
		return $sanitizedStr;
	}
	// Remove all characters except digits, +- and optionally .,eE.
	function numberFloat($number){
		$sanitizedNumber = filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
		return $sanitizedNumber;
	}
	// Remove all characters except digits, plus and minus sign.
	function numberInt($number){
		$sanitizedNumber = filter_var($number, FILTER_SANITIZE_NUMBER_INT);;
		return $sanitizedNumber;
	}
	// This filter is used to escape "<>& and characters with ASCII value below 32
	function specialChars($url){
		$sanitizedUrl = filter_var($url,FILTER_SANITIZE_SPECIAL_CHARS);
		return $sanitizedUrl;
	}
	function fullSpecialChars(){
		
	}
	// Remove all HTML tags from a string
	function string($str){
		$sanitizedStr = filter_var($str, FILTER_SANITIZE_STRING);
		return $sanitizedStr;
	}
	// Remove all HTML tags from a string; as well as all characters that have the ASCII value above 127
	function stringWithAscii($str){
		$sanitizedStr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		return $sanitizedStr;
	}
	// This filter is an alias of the FILTER_SANITIZE_STRING filter
	function stripped($str){
		$sanitizedStr = filter_var($str, FILTER_SANITIZE_STRIPPED);
		return $sanitizedStr;
	}
	// Removes all illegal URL characters from a string and allows all letters, digits and $-_.+!*'(),{}|\\^~[]`"><#%;/?:@&=
	function url($url){
		$sanitizedUrl = filter_var($url, FILTER_SANITIZE_URL);
		return $sanitizedUrl;
	}
	function unsafeRaw(){
		
	}
	// void php_filter_string(PHP_INPUT_FILTER_PARAM_DECL)
	// {
	//     size_t new_len;
	//     unsigned char enc[256] = {0};

	//     /* strip high/strip low ( see flags )*/
	//     php_filter_strip(value, flags);

	//     if (!(flags & FILTER_FLAG_NO_ENCODE_QUOTES)) {
	//         enc['\''] = enc['"'] = 1;
	//     }
	//     if (flags & FILTER_FLAG_ENCODE_AMP) {
	//         enc['&'] = 1;
	//     }
	//     if (flags & FILTER_FLAG_ENCODE_LOW) {
	//         memset(enc, 1, 32);
	//     }
	//     if (flags & FILTER_FLAG_ENCODE_HIGH) {
	//         memset(enc + 127, 1, sizeof(enc) - 127);
	//     }

	//     php_filter_encode_html(value, enc);

	//     /* strip tags, implicitly also removes \0 chars */
	//     new_len = php_strip_tags_ex(Z_STRVAL_P(value), Z_STRLEN_P(value), NULL, NULL, 0, 1);
	//     Z_STRLEN_P(value) = new_len;

	//     if (new_len == 0) {
	//         zval_dtor(value);
	//         if (flags & FILTER_FLAG_EMPTY_STRING_NULL) {
	//             ZVAL_NULL(value);
	//         } else {
	//             ZVAL_EMPTY_STRING(value);
	//         }
	//         return;
	//     }
	// }
}