@extends('layouts.master')

@section('title')

@section('content')
    <div class="p-4 alert alert-success">
        <div class ="text-muted">
            {{$player->first_name}}{{$player->last_name}}
            <a href="{{ route('teams-show',['id' => $player->team->id]) }}">{{$player->team->name}}</a>
        </div>
        <div class ="text-muted">
                {{ $player->email }}
                {{ $player->team->name }}
        </div>
    </div>
@endsection
