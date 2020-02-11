@extends('control::layouts.app')

@section('title', $positionTagCategory->name())

@section('control-content')
    <position-tag-category-show :category="{{$positionTagCategory}}"></position-tag-category-show>
@endsection
