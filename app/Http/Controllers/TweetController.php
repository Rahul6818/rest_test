<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all();

        return response()->json($tweets);
    }

    public function read($id)
    {
        $tweet = Tweet::find($id);

        return response()->json($tweet);
    }

    public function create(Request $request)
    {
        $tweet = Tweet::create($request->all());

        return response()->json($tweet);
    }

    public function update(Request $request, $id)
    {
        $tweet = Tweet::find($id);

        $updated = $tweet->update($request->all());

        return response()->json(['updated' => $updated]);
    }

    public function delete($id)
    {
        $deletedRows = Tweet::destroy($id);

        $deleted = $deletedRows == 1;

        return response()->json(['deleted' => $deleted]);
    }
}