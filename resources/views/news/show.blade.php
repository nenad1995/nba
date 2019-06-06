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

            @if(count($new->teams))
            <ul>
                @foreach($new->teams as $team)
                    <li>
                        <a href="{{route('teams-show',['id' => $team->id])}}">{{ $team->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
