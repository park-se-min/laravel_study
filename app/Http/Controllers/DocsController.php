<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
	protected $docs;

	public function __construct(\App\Documentation $docs)
	{
		$this->docs = $docs;
	}

	public function show($file = null)
	{
		$index = \Cache::remember("docs.index", 0, function () {
			return markdown($this->docs->get());
		});

		$content = \Cache::remember("docs.{$file}", 0, function () use ($file) {
			return markdown($this->docs->get($file ?: 'installation.md'));
		});

		// dd($content);

		return view('docs.show', compact('index', 'content'));
	}

	public function image($file)
	{
		$image = $this->docs->image($file);

		return response($image->encode('png'), 200, [
			'Content-Type'=>'image/png'
		]);
	}
}
