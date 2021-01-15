@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="column galleria">
            <img src="../../public/pictures/1.jpg" alt="...">
            <img src="../../public/pictures/2.jpg" alt="...">
            <img src="../../public/pictures/3.jpg" alt="...">
            <img src="../../public/pictures/4.jpg" alt="...">

        </div>

    </div>

    <div class="row">
        <div class="column galleria">
            <img src="{{asset("public/pictures/5.png")}}" alt="...">
            <img src="public/pictures/6.jpg" alt="...">
            <img src="public/pictures/7.jpg" alt="...">
            <img src="public/pictures/8.jpg" alt="...">

        </div>

    </div>

    <div class="row">
        <div class="column galleria">
            <img src="public/pictures/9.jpg" alt="...">
            <img src="public/pictures/1.jpg" alt="...">
            <img src="public/pictures/2.jpg" alt="...">
            <img src="public/pictures/3.jpg" alt="...">

        </div>

    </div>

    <div class="row">
        <div class="column galleria">
            <img src="public/pictures/4.jpg" alt="...">
            <img src="public/pictures/5.png" alt="...">
            <img src="public/pictures/6.jpg" alt="...">
            <img src="public/pictures/7.jpg" alt="...">
        </div>

    </div>

@endsection
