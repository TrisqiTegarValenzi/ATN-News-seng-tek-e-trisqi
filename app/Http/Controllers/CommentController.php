<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Notifications\CommentReplied;
use Illuminate\Http\Request;

class CommentController extends Controller
{

public function reply(Request $request, $id)
{
    // proses membalas komentar
    
    $comment = Komentar::find($id);
    $user = $comment->user;
    
    $user->notify(new CommentReplied($comment));
    
    return redirect()->back();
}

}
