@extends('control::layouts.app')

@section('title', $groupTagCategory->name())

@section('control-content')
    <group-tag-category-show :category="{{$groupTagCategory}}"></group-tag-category-show>
@endsection
