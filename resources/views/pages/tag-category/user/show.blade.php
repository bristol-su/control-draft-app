@extends('control::layouts.app')

@section('title', $userTagCategory->name())

@section('control-content')
    <user-tag-category-show :category="{{$userTagCategory}}"></user-tag-category-show>
@endsection
