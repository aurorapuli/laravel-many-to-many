@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1 class="mb-5">My projects</h1>

    <ul style="width: 500px" class="projects">
        @foreach ($types as $type)
            <li class="mb-5">
                <div><b>Type: </b> {{ $type->languages }}</div>

                <ul>
                    @foreach ($type->projects as $project)
                        <li style="border: 1px solid black; padding: 7px">
                            <div><b>Title: </b> {{ $project->title }}</div>
                            <div>{{ $project->description }}</div>
                        </li>
                    @endforeach

                </ul>


            </li>
        @endforeach
    </ul>
@endsection
