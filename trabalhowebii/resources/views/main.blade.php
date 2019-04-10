@extends('principal')

@section('header')
    <img src="{{url('./img/home.png')}}">
    &nbsp;<h2>Menu Principal</h2><br>
@endsection

@section('content')
    <a href="/alunos">ALUNO</a>
    <a href="/professores">PROFESSORES</a>
    <br><br>
@endsection