<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class NewsController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::all(); 
        $categories = Category::all();
        return view('news.index', ['news' => $news, 'categories' => $categories]);
    }

    public function showAll(Request $request)
    {
        $news = News::all(); 
        $categories = Category::all();
        return view('news.index', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = News::all();
        $categories = Category::all();
        return view('news.create', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new News;

        if ($request->file('news_photo')) {
            $photo = $request->file('news_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $news->image_path = asset('/images') . '/' . $file;
        }
        
        $news->category_id = $request->category_id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();
        return redirect()->route('news-index')->with('success', 'Naujiena sėkmingai pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(int $newsId)
    {
        $news = News::where('id', $newsId)->first();
        $categories = Category::all();

        return view('news.show', ['news' => $news, 'categories' => $categories,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('news.edit', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if ($request->file('news_photo')) {
            if ($news->image_path) {
            $name = pathinfo($news->image_path, PATHINFO_FILENAME);
            $ext = pathinfo($news->image_path, PATHINFO_EXTENSION);
            $path = public_path('/images') . '/' . $name . '.' . $ext;

            if (file_exists($path)) {
                unlink($path);
            }
        }
        
            $photo = $request->file('news_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $photo->move(public_path() . '/images', $file);
            $news->image_path = asset('/images') . '/' . $file;
        }

        $news->title = $request->newTitle;
        $news->content = $request->newContent;
        $news->category_id = $request->newCategory;
        
        $news->save();
        return redirect()->route('news-index')->with('infoUpdate', 'Naujienos informacija sėkmingai paredaguota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news->image_path) {
            $name = pathinfo($news->image_path, PATHINFO_FILENAME);
            $ext = pathinfo($news->image_path, PATHINFO_EXTENSION);
            $path = public_path('/images') . '/' . $name . '.' . $ext;
    
            if(file_exists($path)) 
            {
                unlink($path);
            }
        }
        $news->delete();
        return redirect()->route('news-index')->with('deleted', 'Mechanics information successfully deleted.');
    }
}
