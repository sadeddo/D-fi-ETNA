@extends('layouts.layout')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js%22%3E"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js%22%3E"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js%22%3E"></script>
<body>

    <div ></div>
<form class="recherche" action="{{ route('search.etudiant')}}">
        <input class="search" type="text" name="q" value="{{ request()-> q ?? '' }}" placeholder="Login">
        <button type="submit">Rechercher</button>
    </form>
</div>
    <div class="canvas_div_pdf">   
    <form action="{{route('generate') }}" method="get">
    <div class="container">
    <div class="present">
    <h1 style = "text-align:center;">Liste des étudiants présents :</h1>
    <table class="listetud"  class="w3-table w3-bordered">
        <tr>
            <td>Id</td>
            <td>Login</td>
            <td>Heure d'enregistrement</td>
            <td>Statut</td>
            <td>Informations</td>
        
        </tr>
        @foreach($etudiants as $etudiant)
        @if($etudiant->status=="présent")
        <tr>
            <td>{{$etudiant['id']}}</td>
            <td>{{$etudiant['login']}}</td>
            <td>{{$etudiant['time']}}</td>
            <td>{{$etudiant['status']}}</td>
            <td>
                <a href="etudiant/{{$etudiant->login}}" class="but">Detail</a>
            </td>
            <!--<form action="/justification/{{$etudiant['id']}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><input type ="text" name="justification" value = "{{$etudiant['justification']}}"></td>
            <td><a href="/justification/{{$etudiant['id']}}">Enregistrer</a></td>-->
        </tr>
        @endif
         
        @endforeach
        
    </table>
</div>

<!--</form>-->
<div class="autre">
<div class="absent">
<h1 style = "text-align:center;">Liste des étudiants absents :</h1>
    <table class="listetud"  class="w3-table w3-bordered">
        <tr>
            <td>Id</td>
            <td>Login</td>
            <td>Heure d'enregistrement</td>
            <td>Statut</td>
            <td>Informations</td>
            <td>Justifié</td>
        </tr>
        @foreach($etudiants as $etudiant)
        @if($etudiant->status=="absent")
        <tr>
            <td>{{$etudiant['id']}}</td>
            <td>{{$etudiant['login']}}</td>
            <td>{{$etudiant['time']}}</td>
            <td>{{$etudiant['status']}}</td>
            <td>
                <a href="etudiant/{{$etudiant->login}}" class="but">Detail</a>
            </td>
            <!--<form action="/justification/{{$etudiant['id']}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><input type ="text" name="justification" value = "{{$etudiant['justification']}}"></td>
            <td><a href="/justification/{{$etudiant['id']}}">Enregistrer</a></td>-->
        </tr>
        @endif
         
        @endforeach
        
    </table>
</div>
    <div class="retard">
    <h1 class="">Liste des étudiants en retard :</h1>
    <table class="listetud" >
        <tr>
            <td>Id</td>
            <td>Login</td>
            <td>Heure d'enregistrement</td>
            <td>Statut</td>
            <td>Informations</td>
            <td>Justifié</td>
        </tr>
        @foreach($etudiants as $etudiant)
        @if($etudiant->status=="retard")
        <tr>
            <td>{{$etudiant['id']}}</td>
            <td>{{$etudiant['login']}}</td>
            <td>{{$etudiant['time']}}</td>
            <td>{{$etudiant['status']}}</td>
            <td>
                <a href="etudiant/{{$etudiant->login}}" class="but">Detail</a>
            </td>
            <!--<form action="/justification/{{$etudiant['id']}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <td><input type ="text" name="justification" value = "{{$etudiant['justification']}}"></td>
            <td><a href="/justification/{{$etudiant['id']}}">Enregistrer</a></td>-->
        </tr>
        @endif
         
        @endforeach
        
    </table>
</div>
</div>
</div>
</div>
<button onclick="getPDF()">generate</button>


@endsection