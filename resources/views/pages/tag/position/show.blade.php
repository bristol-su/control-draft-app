@extends('control::layouts.app')

@section('title', $positionTag->name())

@section('control-content')
    <position-tag-show :tag="{{$positionTag}}"></position-tag-show>
@endsection
