@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Progetti:</h1>
    <ul>

        @foreach ($projects as $project)
        <li>
            <h3>Nome Progetto: {{$project -> name}}</h3>
            <h3>Tipologia Progetto: {{$project -> type -> tipologia}}</h3>
            <br>
            <br>
        </li>

        @endforeach
    </ul>
@endsection
