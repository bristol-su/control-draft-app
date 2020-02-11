@extends('control::layouts.app')

@section('title', $user->data()->preferred_name)

@section('control-content')
    <user-show :user="{{$user}}"></user-show>
@endsection
