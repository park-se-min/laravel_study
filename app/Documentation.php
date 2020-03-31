<?php

namespace App;

use File;

class Documentation
{
    public function get($file='documentation.md'){
		$content = File::get($this->path($file));

		return $this->replaceLinks($content);
	}

	protected function path($file, $dir='docs')
	{
		$file = ends_with($file, ['.md', '.png']) ? $file : $file .'.md';
		$path = base_path('docs' . DIRECTORY_SEPARATOR . $file);

		if (! File::exists($path)){
			abort(404, 'XXXXX');
		}

		return $path;
	}

	protected function replaceLinks($content){
		return str_replace('/docs/{{version}}', '/docs', $content);
	}

	public function image($file)
	{
		return \Image::make($this->path($file, 'docs/images'));
	}

}
