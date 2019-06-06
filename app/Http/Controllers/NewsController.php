<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Team;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->paginate(10);

        return view('news.index',compact('news'));
    }
    public function show(Team $teams, $id)
    {
        $user = auth()->user();
        $new =$teams->news()->paginate(10); ;

        return view('news.show',compact('new'));
    }
}
