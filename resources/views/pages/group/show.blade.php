@extends('control::layouts.app')

@section('title', $group->data()->name())

@section('control-content')
    <group-show :group="{{$group}}"></group-show>
@endsection
