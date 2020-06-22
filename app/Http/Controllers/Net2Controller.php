<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Condition;

class Net2Controller extends Controller
{
    public function index(Request $request)
    {
        $posts = Condition::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('net2.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
