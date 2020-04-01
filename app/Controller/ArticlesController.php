<?php

namespace App\Controller;

use App\Controller\Controller;
use Bow\Http\Request;
use Bow\Http\Redirect;

use App\Model\Article;

class ArticlesController extends Controller
{
	/**
	* Show list
	*
	* @return mixed
	*/
	public function list()
	{
		return view('articles/list', [ 
			'articles' => Article::all(),
			'flash' => '',
			'flashStatus' => '',
		]);
	}


	/**
	* View one
	*
	* @param int $id
	*
	* @return mixed
	*/
	public function view($id)
	{
		return view('articles/view', [ 
			'article' => Article::find($id), 
			'flash' => '',
			'flashStatus' => '',
		]);
	}


	/**
	* Add one
	*
	* @return mixed
	*/
	public function add()
	{
		$request = Request::getInstance();
		$redirect = Redirect::getInstance();
		$article = new Article([
			'title'=>'', 'body'=>'',
			'slug'=>'', 'created'=>''
		]);
		$flash = '';
		$flashStatus = '';

		if($request->isPost()){
			try {

				$vars = $request->all();
				$vars['user_id'] = 1;
				$vars['slug'] =  ArticlesController::slugify($vars['title']);
				$vars['created'] = (new \DateTime('NOW'))->format('Y-m-d H:i:s');
				unset($vars['_token']);

				$article = Article::create($vars);

				$flash = 'Successfully created';
				$flashStatus = 'success';
		
				//$redirect->to("/articles/view/" . $article->id);
				return view('articles/view', [
					'article' => $article,
					'flash' => $flash,
					'flashStatus' => $flashStatus,
				]);

			} catch(Exception $e){

				$flash = $e->getMessage();
				$flashStatus = 'error';
			}
		}

		return view('articles/add', [
			'article' => $article,
			'flash' => $flash,
			'flashStatus' => $flashStatus,
		]);
	}

	/**
	* Update one
	*
	* @param int $id
	*
	* @return mixed
	*/
	public function edit($id)
	{
		$request = Request::getInstance();
		$redirect = Redirect::getInstance();
		$article = Article::find($id);
		$flash = '';
		$flashStatus = '';

		if($request->isPost()){
			try {

				$vars = $request->all();

				$vars['slug'] =  ArticlesController::slugify($vars['title']);
				$vars['modified'] = (new \DateTime('NOW'))->format('Y-m-d H:i:s');
				unset($vars['_token']);

				$article->setAttributes($vars);
				$article->save();

				$flash = 'Successfully saved';
				$flashStatus = 'success';
		
				//$redirect->to("/articles/view/" . $article->id);
				return view('articles/view', [
					'article' => $article,
					'flash' => $flash,
					'flashStatus' => $flashStatus,
				]);

			} catch(Exception $e){

				$flash = $e->getMessage();
				$flashStatus = 'error';
			}
		}
		
		return view('articles/edit', [
			'article' => $article,
			'flash' => $flash,
			'flashStatus' => $flashStatus,
		]);
	}

	/**
	* Delete
	*
	* @param int $id
	*
	* @return mixed
	*/
	public function delete($id)
	{
		$request = Request::getInstance();
		$redirect = Redirect::getInstance();
		$article = Article::find($id);
		$flash = '';
		$flashStatus = '';

		try {
			$id = $article->delete($id);

			$flash = 'Successfully deleted';
			$flashStatus = 'success';
		
		} catch(Exception $e){

			$flash = $e->getMessage();
			$flashStatus = 'error';
		}

		//$redirect->to("/articles/list");
		return view('articles/list', [ 
			'articles' => Article::all(),
			'flash' => $flash,
			'flashStatus' => $flashStatus,
		]);
	}



	/**
	* Utility: writeLog
	*
	* @return null
	*/
	public static function writeLog($t){
		$f = fopen("log.log", "a") or die("Unable to open file!");
		fwrite($f, $t."\n");
		fclose($f);
	}
	/**
	* Utility: slugify
	*
	* @return string
	*/
	public static function slugify($s){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $s), '-'));
    }
}

