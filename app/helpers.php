<?php
	if (! function_exists('makdown')) {
		function markdown($text = null)
		{
			return app(ParsedownExtra::class)->text($text);
		}
	}
?>