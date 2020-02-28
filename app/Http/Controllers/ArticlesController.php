<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//// 1
		// $articles = \App\Article::get();
		
		//// 2
		// $articles = \App\Article::with('user')->get();
		
		//// 3
		// $articles = \App\Article::get();
		// $articles->load('user');
		
		//// 4
		$articles = \App\Article::latest()->paginate(10);

		return view('articles.index', compact('articles'));

		// return "ArticlesController_index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
		return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		  //
		  $rules = [
			  'title' => ['required'],
			  'content' => ['required', 'min:10'],
		  ];

		  $validator = \Validator::make($request->all(), $rules);

		  if ($validator->fails()) {
			  return back()->withErrors($validator)->withInput();
		  }

		  $article = \App\User::find(1)->articles()->create($request->all());

		 if (!$article) {
			return back()->with('flash_message', '글저장ㄴㄴ')->withInput();
		  }

		  return redirect(route('articles.index'))->with('flash_message', '글저장 ㅇㅇㅇㅇㅇ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}