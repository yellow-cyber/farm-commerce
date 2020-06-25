@extends('layouts.app')

@section('content')
<div>
    @auth

    {{-- <auth-user name="{{Auth::user()->name}}" id="{{Auth::user()->id}}"></auth-user> --}}
    @endauth
   
    <x-admin-navbar></x-admin-navbar>

<router-view></router-view>
</div>

@endsection
