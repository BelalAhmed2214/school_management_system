<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Video;
use Illuminate\Http\Request;
class LectureController extends Controller
{
    public function viewLectures()
    {
        $videos = Video::where('role_id',2)->get();
        $articles = Article::where('role_id',2)->get();
        return view('teachers.lectures.index',compact('videos','articles'));
    }
}
