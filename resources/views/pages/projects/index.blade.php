@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Projects</h1>

    <a href="{{ route('project.create') }}">CREATE</a>

    <ul class="d-flex justify-content-center flex-wrap">
        @foreach ($projects as $project)
            <li class="card text-start p-4 m-2" style="width: 500px">
                <div><b>Title: </b>{{ $project->title }}</div>
                <div><b>Description: </b>{{ $project->description }}</div>
                <div><b>Type: </b>{{ $project->type->languages }}</div>
                @foreach ($project->technologies as $technology)
                    <div><b>Technologies: </b>{{ $technology->name }}</div>
                @endforeach


            </li>
        @endforeach


    </ul>
@endsection
