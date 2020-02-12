@extends('control::layouts.app')

@section('title', $groupTag->name())

@section('control-content')
    <group-tag-show :tag="{{$groupTag}}"></group-tag-show>
@endsection
