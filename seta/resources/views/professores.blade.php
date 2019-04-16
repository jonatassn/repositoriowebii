@extends('principal')

<a href="{{url('/')}}">Home</a>
@section('header')
    <h5>(Seção Blade Cabeçalho)</h5>
    <h2>Professores Cadastrados</h2>
@endsection

@section('content')
    <h5>(Seção Blade Conteúdo)</h5>
    <h3>Diego Hoss</h3>
    <h3>Valério Brusamolim</h3>
    <br>
@endsection
