<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->paginate(10);

        return view('news.index',compact('news'));
    }
    public function show($id)
    {
        $user = auth()->user();
        $new = News::findOrFail($id);

        return view('news.show',compact('new'));
    }
}
