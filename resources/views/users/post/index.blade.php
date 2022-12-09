@extends('layouts.app')
@include('navbar')
@include('footer')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

{{--  sign out --}}
<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    sign out<br/>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
{{--  sign out --}}

<p>top page</p>
<a href="#" class="btn btn-primary">button</a>

@endsection
