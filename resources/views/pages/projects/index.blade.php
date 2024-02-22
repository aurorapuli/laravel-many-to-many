@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>My projects</h1>

    <ul>
        @foreach ($types as $type)
            <li>
                <div><b>Type: </b> {{ $type->languages }}</div>
            </li>
        @endforeach
    </ul>
@endsection
