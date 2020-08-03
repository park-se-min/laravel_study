<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
	{
		$this->middleware('auth', ['except'=>['index', 'show']]);
	}

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

		// dd(view('articles.index', compact('articles'))->render());

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
		$article = new \App\Article;

		return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   //  public function store(ArticlesRequest $request)
    public function store(\App\Http\Requests\ArticlesRequest $request)
    {
		// $this->validate($request, $rules, $messages);

		//   $validator = \Validator::make($request->all(), $rules, $messages);

		//   if ($validator->fails()) {
		// 	  return back()->withErrors($validator)->withInput();
		//   }

		// $user = $request->user();

		// $article = $request->user()->articles()->create($request->all());

		// var_dump('이벤트 시작');
		// echo '<br>';

		// event(new \App\Events\ArticleCreatedTest($article));

		// echo '<br>';
		// var_dump('이벤트 끝');
		// echo '<br>';



		$article = $request->user()->articles()->create($request->all());


		if($request->hasFile('files'))
		{
			$files = $request->file('files');

			foreach ($files as $file)
			{
				$filename = str_random(). filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
				$file->move(attachments_path(), $filename);

				$article->attachments()->create([
					'filename' => $filename,
					'bytes' => $file->getClientSize(),
					'mime' => $file->getClientSize()
				]);
			}
		}

		// $article = \App\User::find(1)->articles()->create($request->all());

		if (!$article) {
			return back()->with('flash_message', '글저장ㄴㄴ')->withInput();
		}

		// var_dump('이벤트 시작');
		// echo '<br>';
		// // event('article.created', [$article]);
		// // event(new \App\Events\ArticleCreated($article));
		// event(new \App\Events\ArticlesEvent($article));
		// echo '<br>';
		// var_dump('이벤트 끝');
		// echo '<br>';

		return redirect(route('articles.index'))->with('flash_message', '글저장 ㅇㅇㅇㅇㅇ');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function show(\App\Article $article)
    public function show(\App\Article $article)
    {
		// $article = \App\Article::get()->where;
		// dd($article->title);

		// $article = \App\Article::findOrFail($id);

		// debug($article->toArray());

		// echo($article);

		// dd($article);

		// return $article->toArray();

		return view('articles.show', compact('article'));

		// return __METHOD__ .' 기본키를 가진 Article whghl :'. $id;
	}

/*
	 public function show($id)
    {
		$article = \App\Article::findOrFail($id);

		debug($article->toArray());

		// dd($article);

		// return $article->toArray();

		return view('articles.show', compact('article'));

		// return __METHOD__ .' 기본키를 가진 Article whghl :'. $id;
    }
 */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Article $article)
    {
		$this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ArticlesRequest $request, \App\Article $article)
    {
		//

		$article->update($request->all());
		flash()->success('수정');

		return redirect(route('articles.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Article $article)
    {
		$this->authorize('delete', $article);

		$article->delete();

		return response()->json([], 204);
	}

    public function destroy2(\App\Article $article)
    {
		$this->authorize('delete', $article);

		$article->delete();

		return redirect(route('articles.index'));
    }
}