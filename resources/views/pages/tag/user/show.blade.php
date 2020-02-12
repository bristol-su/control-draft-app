@extends('control::layouts.app')

@section('title', $userTag->name())

@section('control-content')
    <user-tag-show :tag="{{$userTag}}"></user-tag-show>
@endsection
