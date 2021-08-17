@extends('layout/main')

@section('title', 'Hanan Iqbal')

@section('container')


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="main">
    <div class="jumbotron jumbotron-fluid text-center">

        <img src="Koro.JPEG" alt="" class="rounded-circle">

        <h1 class="display-4">Hanan Iqbal Alrahma</h1>
        <p class="lead">Hai semua '-')/</p>

    </div>
</div>
</div>

<script>
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>



@endsection