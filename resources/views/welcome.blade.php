@extends ('layout.main')

@section('content')
    @if (Auth::check())
        <h1> Hello, {{{Auth::user()->username}}} </h1>
    @else 
        //The user is not authenticated...
    @endif
@stop 