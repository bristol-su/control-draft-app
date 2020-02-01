@extends('control::layouts.app')

@section('title', $role->data()->roleName())

@section('control-content')
    <role-show :role="{{$role}}"></role-show>
@endsection
