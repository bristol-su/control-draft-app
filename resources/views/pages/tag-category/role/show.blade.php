@extends('control::layouts.app')

@section('title', $roleTagCategory->name())

@section('control-content')
    <role-tag-category-show :category="{{$roleTagCategory}}"></role-tag-category-show>
@endsection
