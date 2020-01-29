@extends('control::layouts.app')

@section('title', $position->data()->name())

@section('control-content')
    <position-show :position="{{$position}}"></position-show>
@endsection
