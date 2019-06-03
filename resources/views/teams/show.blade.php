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
                <a href="{{ route('players-show',['id' => $team->id]) }}">{{$player->first_name}}{{$player->last_name}}</a>
            </div>
        </div>
    @endforeach

@endsection
