@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1 class="mb-5">New Project</h1>
    <form action="{{ route('project.index') }}" method="POST" class="text-start" style="margin: 0 auto; width: 600px"
        enctype="multipart/form-data">

        @csrf
        @method('POST')


        <label style="width: 100px" for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>
        <label style="width: 100px" for="description">Description</label>
        <input type="text" name="description" id="description">
        <br>
        <label style="width: 100px" for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/png">
        <br>
        <label style="width: 100px">Type</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->languages }}</option>
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
                value="{{ $technology->id }}">
            <br>
        @endforeach
        <input class="mt-4" type="submit" value="CREATE">



    </form>
@endsection
