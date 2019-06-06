@extends('layouts.master')

@section('title')
Account verification
@endsection

@section('content')
    <h3>Welcome {{ $user->name }}. Click <a href="{{ route('login') }}">here</a> for login</h3>
@endsection
