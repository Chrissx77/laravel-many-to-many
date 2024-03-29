@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>New Project</h1>

    <form method="POST">
        @method('PUT')
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}">
        <br><br>

        <label for="type_id">Type</label>
        <select name="type_id" id="Type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @selected($project->type->id === $type->id)>
                    {{ $type->tipologia }}
                </option>
            @endforeach
        </select>
        <br>
        <br>
        @foreach ($technologies as $technologie)
            <div>
                <input type="checkbox" name="technologie_id[]" value="{{ $technologie->id }}"
                    id="{{ 'technologie-' . $technologie->id }}"
                    @foreach ($project->technologies as $pTech)
                        @checked($pTech->id === $technologie->id)
                    @endforeach>
                <label for="{{ 'technologie-' . $technologie->id }}">
                    {{ $technologie->name }}
                </label>
            </div>
        @endforeach


        <br>

        <input type="submit" value="Update">

    </form>
@endsection
