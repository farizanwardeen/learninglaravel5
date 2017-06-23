<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Illuminate\Support\Facades\Auth;



class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except'=>'index']);
	}


	public function index()
	{

		$articles= Article::latest('published_at')->published()->get();
		return view('articles.index',compact('articles'));
	}

	public function show(Article $article)
	{
		//$article= Article::findOrFail($id);
		return view('articles.show',compact('article'));
	}

	public function create()
	{
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request)
	{
		//$article= new Article($request->all());
		//Auth::user()->articles()->save($article);
		
		$this->createArticle($request);
		//$article = Auth::user()->articles()->create($request->all());
		//$this->syncTags($article, $request->input('tag_list'));
		//$article->tags()->attach($request->input('tag_list'));
		//session()->flash('flash_message', 'Your article has been created!');
		//session()->flash('flash_message_important', true);

        //flash()->success('Your article has been created');
		flash()->overlay('Your article has been created!', 'Good Job!');
		return redirect('articles');
		/*
		return redirect('articles')->with([
				'flash_message'=>'Your article has been created',
				'flash_message_important' => true

			]);
		*/
	}

	public function edit(Article $article)
	{
		$tags = Tag::lists('name', 'id');
		//$article= Article::findOrFail($id);
		return view('articles.edit',compact('article', 'tags'));
	}

	public function update(ArticleRequest $request, Article $article)
	{
		//$article= Article::findOrFail($id);
		$article->update($request->all());
		//$article->tags()->sync($request->input('tag_list'));
		$this->syncTags($article, $request->input('tag_list'));
		return redirect('articles');
	}

	private function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
	}

	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());
		$this->syncTags($article, $request->input('tag_list'));
		return $article;
	}


}
