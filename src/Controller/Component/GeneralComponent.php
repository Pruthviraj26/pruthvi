<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
class GeneralComponent extends Component{
    
			public static function generateRandomString($length = 10) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
							$randomString .= $characters[rand(0, $charactersLength - 1)];
					}

						//substr(hash('sha256', mt_rand() . microtime()), 0, 20);
					return $randomString;
			}

			function getKeywords($text) {

			$stopwords = file('stop_words.txt');
			// Remove line breaks and spaces from stopwords
			$stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
			// Replace all non-word chars with comma
			$pattern = '/[0-9\W]/';
			$text = preg_replace($pattern, ',', $text);
			// Create an array from $text
			$text_array = explode(",",$text);
			// remove whitespace and lowercase words in $text
			$text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
			foreach ($text_array as $term) {
				if (!in_array($term, $stopwords)) {
					$keywords[] = $term;
				}
			};
			return array_filter($keywords);
		}
  

	function getSEOfriendlyUrl($string){
			$string = str_replace(array('[\', \']'), '', $string);
			$string = preg_replace('/\[.*\]/U', '', $string);
			$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
			$string = htmlentities($string, ENT_COMPAT, 'utf-8');
			$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
			$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
			return strtolower(trim($string, '-'));
		}
	
}