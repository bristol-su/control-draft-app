@extends('control::layouts.app')

@section('title', $roleTag->name())

@section('control-content')
    <role-tag-show :tag="{{$roleTag}}"></role-tag-show>
@endsection
