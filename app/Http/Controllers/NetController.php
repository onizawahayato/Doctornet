<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Symptom;

class NetController extends Controller
{
    public function index(Request $request)
    {
        $posts = Symptom::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('net.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
