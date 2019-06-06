@extends('layouts.master')

@section('title',$team->title)

@section('content')

    <div>{{  $team->name  }}</div>
    <div>{{  $team->address  }}</div>
    <div>{{  $team->city  }}</div>
    <div>{{  $team->email  }}</div>
        <hr/>

    @foreach($team->players  as $player)
        <div class="p-4 alert alert-success">
            <div class ="text-muted">
                <a href="{{ route('players-show',['id' => $team->id]) }}">{{ $player->first_name }}{{ $player->last_name }}</a>
            </div>
        </div>
    @endforeach

    <hr>
    @foreach($team->comments as $comment)
        <div class="p-4 alert alert-success">
            <div class ="text-muted">
                {{$comment->created_at}}
            </div>
            <p>{{$comment}}</p>
            @if($comment->user)
                <strong>{{$comment->user->name}} says: </strong>
            @endif
                {{ $comment->content}}
        </div>
@endforeach
    <hr>

    <h2>Leave a comment</h2>

    <form method="POST" action="{{ route('team-comments', ['team_id' => $team->id]) }}">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="email" class="form-control" id="content" name="content"></textarea>
            @include('partials.error-message', ['fieldTitle' => 'content'])
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>


@endsection
