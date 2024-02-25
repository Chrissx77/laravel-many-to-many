@extends('layouts.main-layout')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Tipi:</h1>
    <ul>
        @foreach ($types as $type)
            <li>
                {{ $type->tipologia }}
                <ul>
                    @foreach ($type -> projects as $project)
                        <li>
                            <br>
                            <br>
                            {{$project -> name}}
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection
