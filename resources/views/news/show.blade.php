@extends('layouts.master')

@section('title',$new->title)


@section('content')

    <div class="container">
        <div>{{  $new->title  }}</div>
            <div>{{  $new->content  }}</div>
        <hr/>
        @if($new->user)
        <p>Created by {{ $new->user->name }}</p>
        @endif
    </div>

@endsection
