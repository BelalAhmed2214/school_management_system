<?php

namespace App\Http\Controllers\Teacher\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Course;
use App\Models\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewArticles',User::class);
        $articles = Article::all();
        return view('teachers.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('teachers.articles.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->course_id = $request->input('course_id');
        $article->user_id = auth()->id();
        $article->save();

        return redirect()->route('teacher.article.index')->with('success', 'Article added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('teachers.articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $courses = Course::all();
        return view('teachers.articles.edit',compact('article','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->course_id = $request->input('course_id');
        $article->user_id = auth()->id();
        $article->save();
        return redirect()->route('teacher.article.index')->with('success', 'Article Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('teacher.article.index')->with('success', 'Article Deleted successfully.');

    }
}
