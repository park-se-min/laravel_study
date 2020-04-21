<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestPHPCode extends Controller
{
	public function index()
	{
		$arr = array('1', '2', '3');
		$arr2 = array(
			'a'=>'4',
			'b'=>'5',
			'c'=>'6',
		);

		var_dump($arr);

		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo "<br>";

		var_dump($arr2);

		echo '<pre>';
		print_r($arr2);
		echo '</pre>';
		exit;
	}
}
