<?php

namespace App\Http\Controllers\News\Comments;

use App\Http\Requests\News\Comments\StoreCommentRequest;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CommentController extends \App\Http\Controllers\Controller
{
    

    public function store(int $newsId, StoreCommentRequest $request)
    {
        $data = $request->validated();
        
        $news = News::all();
        $comments = Comment::all();
        $data = new Comment();
        $data['comment'] = $request->comment;
        $data['user_id'] = Auth::user()->id;
        $data['news_id'] = $newsId;
        $data->save();
        

        
        return redirect()->route('news-show', ['news' => $news, 'comments' => $comments, $newsId]);
    }
}
