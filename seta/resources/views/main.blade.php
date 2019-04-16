@extends('principal')

@section('header')
    <img src="{{url('/img/home.png')}}">
    &nbsp; <h2>Menu Principal</h2>
@endsection

@section('content')
    <a href="/alunos"><img src="{{url('/img/student.png')}}"></a>
    <a href="/professores"><img src="{{url('/img/teacher.png')}}"></a>

@endsection
