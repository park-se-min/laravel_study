<?php
	$coworkers= array('egoing', 'leezche', 'duru', 'taeho');

	echo $coworkers[1].'<br>';
	echo $coworkers[3].'<br>';

	echo '<pre>';
	print_r(count($coworkers));
	echo '</pre>';
	echo 2;

	echo array_push($coworkers,'graphittie');  //끝에 추가

	echo '<pre>';
	print_r($coworkers);
	echo '</pre>';

	echo '<br>';

	echo array_pop($coworkers); // 끝에 지움
	var_dump($coworkers);

	echo '<pre>';
	print_r($coworkers);
	echo '</pre>';

	$aaa = array('a','b','c','d');

	echo array_push($aaa,'e');
	var_dump($aaa);

	echo '<br>';

	echo array_pop($aaa);
	var_dump($aaa);

	echo '<br>';
?>