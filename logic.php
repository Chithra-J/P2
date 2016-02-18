<?php

$user_input = Array();
$flag_err = false;
$err_mesg = "";
$html_arr = array(
    0    => "http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html",
    1    => "http://www.paulnoll.com/Books/Clear-English/words-03-04-hundred.html",
    2    => "http://www.paulnoll.com/Books/Clear-English/words-05-06-hundred.html",
    3    => "http://www.paulnoll.com/Books/Clear-English/words-07-08-hundred.html",
    4    => "http://www.paulnoll.com/Books/Clear-English/words-09-10-hundred.html",
    5    => "http://www.paulnoll.com/Books/Clear-English/words-11-12-hundred.html",
    6    => "http://www.paulnoll.com/Books/Clear-English/words-13-14-hundred.html",
    7    => "http://www.paulnoll.com/Books/Clear-English/words-15-16-hundred.html",
    8    => "http://www.paulnoll.com/Books/Clear-English/words-17-18-hundred.html",
    9    => "http://www.paulnoll.com/Books/Clear-English/words-19-20-hundred.html"
    );

$words_arr = $num_arr = array();
$pass_str ="";
$spl_char = array(
    0    => "|",
    1    => "~",
    2    => "!",
    3    => "@",
    4    => "#",
    5    => "$",
    6    => "%",
    7    => "^",
    8    => "&",
    9    => "*"
    );

function get_unique_random_number($min, $max, $count) {
	$num_array = range($min, $max);
	shuffle($num_array);
	return array_slice($num_array, 0, $count);
}

function get_unique_words($number_of_words) {
	global $pass_str,$words_arr,$num_arr,$html_arr;
	$i=$j=0;
	
	$url_to_parse = $html_arr[rand(0,9)];
	$html = file_get_contents($url_to_parse);
	#print_r ($url_to_parse);
	$dom = new DOMDocument;
	libxml_use_internal_errors(true);
	$dom -> loadHTML($html);
	$words = $dom -> getElementsByTagName('li');
	$num_arr = get_unique_random_number(0,100,$number_of_words);
	sort($num_arr);
	/*
	foreach ($num_arr as $key => $val) {
			echo "num[" . $key . "] = " . $val . "\n";
		}
		print_r("sorted");
		print_r (sort($num_arr));
		foreach ($num_arr as $key => $val) {
			echo "num[" . $key . "] = " . $val . "\n";
		}
		print_r("After sorted");
		print_r ($num_arr);*/
	
	foreach ($words as $word) {
		if ($j < $number_of_words) {
			if ($i == $num_arr[$j]) {
				#print_r($j);
				#print_r ($num_arr[$j]);
				$words_arr[$j] = preg_replace('/\s+/', ' ', $word -> nodeValue);
				#print_r ($words_arr[$j]);
				$j++;
			}
		} else {
			break;
		}
		$i++;
		
	}
	shuffle($words_arr);
	
	for ($i = 0; $i < $number_of_words; $i++) {
		$pass_str = $pass_str.$words_arr[$i]." ";
	}
	#print_r($pass_str);

}

foreach ($_POST as $key => $value) {
	$user_input[$key] = $value;
}

if (isset($_POST['submit'])) {
	$NumberOfWords = $_POST['NumberOfWords'];
	if (empty($NumberOfWords)) {
		$flagErr = true;
		$err_mesg .= '<label class="err">Invalid input so defaulting to 3 words</label>';
		$NumberOfWords = 3;
	}
	if ($NumberOfWords < 3 || $NumberOfWords > 9) {
		$flagErr = true;
		$err_mesg .= '<label class="err">Make sure the input value is between 3 and 9</label>';
	} else {
		get_unique_words ($NumberOfWords);
		$passwd = trim($pass_str);
		if (!empty($user_input['Number']) && $user_input['Number']== '1') {
			$passwd .= rand(0,9);
		}
		if (!empty($user_input['SplSymb']) && $user_input['SplSymb']== '1') {
			$passwd = $spl_char[rand(0,9)].$passwd ;
		}
	}
}
#print_r($user_input);
#print_r ($pass_str);
#print_r ($num_arr);
#print_r ($user_input);
