<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ ('assets/img/etna.jpg') }}" /><link rel="shortcut icon" type="image/x-icon" href="{{ ('assets/img/etna.jpg') }}" />
    <title>Administration</title>
</head>
<body>
    <header class="header">
        <a href="admin"><img src="{{ ('assets/img/etna3.png') }}" alt="logo etna" ></a>
        
        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="logout">
                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"><button type="submit" value="Se déconnecter" >Se déconnecter</button></a>
</form>
</div>  
<script src="https://code.jquery.com/jquery-1.12.4.js%22%3E"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js%22%3E"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js%22%3E"></script>
    </header>
@yield('content')
</body>
</html>