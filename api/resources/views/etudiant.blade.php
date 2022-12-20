@extends('layouts.layout')
@section('content')
<body>
<form class="recherche" action="{{ route('search.etudiant')}}">
        <input class="search" type="text" name="q" value="{{ request()-> q ?? '' }}" placeholder="Login">
        <button type="submit">Rechercher</button>
    </form>
    <table class="listetud">
        <tr>
        <td>Login</td>
        <td>Heure d'enregistrement</td>
        <td>Statut</td>
        <td>Justification</td>
    </tr>

    @foreach($historiques as $historique)
        <tr>
            <td>{{$historique->login}}</td>
            <td>{{$historique->time}}</td>
            <td>{{$historique->status}}</td>
            <td><form action="/justification/{{$historique['id']}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><input type ="text" name="justification" value = "{{$historique['justification']}}" ><input type="submit" value="Justifier"></td>
        </tr>
         
    @endforeach
    </table>
@endsection