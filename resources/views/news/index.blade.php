extends('layouts.master')

@section('title')
All News
@endsection

@section('content')

<div class="container">
  <main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">News</h3>

        @foreach($news as $new)

        <div class="blog-post">
            <p class="blog-post-meta"> {{ $new->created_at }}</p>
            @if($new->user)
                <p>Created by {{ $new->user->name }}</p>
            @endif
            <h2 class="blog-post-title"><a href="{{ route('news-show',['id' => $new->id]) }}"> {{ $new->title }}</a></h2>
            <p>{{ $new->content }}</p>
        </div><!-- /.blog-post -->

        @endforeach

    </div><!-- /.row -->
  </main><!-- /.container -->
  {{$news->links()}}

@endsection
