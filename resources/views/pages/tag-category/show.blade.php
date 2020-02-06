@extends('control::layouts.app')

@section('title', $tagCategory->name())

@section('control-content')
    <tag-category-show :tagCategory="{{$tagCategory}}"></tag-category-show>
@endsection
