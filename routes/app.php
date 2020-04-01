<?php

/**
 * Loading roads..
 *
 * Here is where you need to register all the routes in your application.
 * You'll see, it's a breeze.
 *
 * Just tell Bow which URIs he should answer and give him the
 * controller to call when this URL is requested.
 *
 * Follow the following example, it gives you an overview on how it works in general.
 */

/************
$app->get('/', function () {
    return response()->render('welcome');
});

$app->get('/:name/:age', 'WelcomeController');
************/
use App\Model\Article;

$app->get('/', 'ArticlesController::list');

$app->prefix('/articles', function () use ($app)
{
	$app->get('/list', 'ArticlesController::list');

	$app->match(['POST', 'GET'], '/add', 'ArticlesController::add');

	$app->get('/view/:id', 'ArticlesController::view');

	$app->match(['POST', 'GET'], '/edit/:id', 'ArticlesController::edit');

	$app->get('/delete/:id', 'ArticlesController::delete');
});
