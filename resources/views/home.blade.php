@extends('layouts.app')

@section('content')
<div class="container">

@auth
<p>Role = {{ Auth::user()->profile->role}}</p>
    
@endauth
</div>
@endsection
