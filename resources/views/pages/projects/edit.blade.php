@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1 class="mb-5">Edit Project</h1>
    <form action="{{ route('project.update', $project->id) }}" method="POST" class="text-start"
        style="margin: 0 auto; width: 600px">

        @csrf
        @method('PUT')


        <label style="width: 100px" for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $project->title }}">
        <br>
        <label style="width: 100px" for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $project->description }}">
        <br>
        <label style="width: 100px" for="img">Image</label>
        <input type="text" name="img" id="img" value="{{ $project->img }}">
        <br>
        <label style="width: 100px">Type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @if ($project->type->id == $type->id) selected @endif>
                    {{ $type->languages }}
                </option>
            @endforeach

        </select>
        <br>
        <label style="width: 100px">Technologies</label>
        <br>

        @foreach ($technologies as $technology)
            <label style="width: 100px" for="{{ 'technology_id_' . $technology->id }}">
                {{ $technology->name }}
            </label>

            <input type="checkbox" name="technology_id[]" id="{{ 'technology_id' . $technology->id }}"
                value="{{ $technology->id }}"
                @foreach ($project->technologies as $project_technology)
                    @if ($project_technology->id == $technology->id)
                        checked
                    @endif @endforeach>
            <br>
        @endforeach
        <input class="mt-4" type="submit" value="EDIT">



    </form>
@endsection
