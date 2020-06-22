<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Diagnosis;

class Net1Controller extends Controller
{
    public function index(Request $request)
    {
        $posts = Diagnosis::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('net1.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
