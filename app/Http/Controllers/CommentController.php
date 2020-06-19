<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function comment(Request $request) {
        $data = $request->all();

        Comment::create($data);

        flash('Sua mensagem foi enviada!')->success();

        return view('contact');
    }
}
