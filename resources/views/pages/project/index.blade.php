@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Progetti:</h1>
    <a href="{{route('project.create')}}">Create</a>
    <ul>

        @foreach ($projects as $project)
            <li>
                <h3>Nome Progetto: {{ $project->name }}</h3>
                <h3>Tipologia Progetto: {{ $project->type->tipologia }}</h3>
                <img src="{{asset('storage/' . $project -> image)}}" alt="" srcset="">
                <br>
                <a href="{{route('project.edit', $project->id)}}">EDIT</a>
                <ul>
                    <h2>Tecnologie:</h2>
                    @foreach ($project->technologies as $technologie)
                        <li>
                            <h4>{{ $technologie->name }}</h4>
                        </li>
                    @endforeach
                </ul>
                <br>
                <br>
                <br>
            </li>
        @endforeach
    </ul>
@endsection
