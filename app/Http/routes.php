<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $app->get('/', function () use ($app) {
//     return $app->version();
// });

$app->get('encode', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'result' => base64_encode($request->input('value')),
    ]);
});

$app->get('decode', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'result' => base64_decode($request->input('value')),
    ]);
});
$app->group(['prefix' => 'api/v1', 'namespace' => 'App/Http/Controllers'], function ($app) {
    $app->group(['prefix' => 'Tweet'], function ($app) {
        // Returns all the Tweets
        // GET http://localhost:8000/Tweet
        $app->get('/', 'TweetController@index');

        // Returns the Tweet with the chosen $id
        // e.g. GET http://localhost:8000/Tweet/48
        $app->get('{id}', 'TweetController@read');

        // Creates a new Tweet
        // POST http://localhost:8000/Tweet
        $app->post('/', 'TweetController@create');

        // Update the Tweet with the chosen $id
        // PUT http://localhost:8000/Tweet/48
        $app->put('{id}', 'TweetController@update');

        // Delete the Tweet with the chosen $id
        // DELETE http://localhost:8000/Tweet/48
        $app->delete('{id}', 'TweetController@delete');
    });
});

?>