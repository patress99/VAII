@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url("/") }}">

            <label for="fname">Meno</label>
            <input type="text" id="fname" name="firstname" placeholder="Vaše meno..">

            <label for="lname">Priezvisko</label>
            <input type="text" id="lname" name="lastname" placeholder="Vaše priezvisko..">

            <label for="country">Krajina</label>
            <select id="country" name="country">
                <option value="sk">Slovensko</option>
                <option value="cz">Česká republika</option>

            </select>

            <label for="subject">Predmet</label>
            <textarea id="subject" name="subject" placeholder="Napíšte nám.." style="height:200px"></textarea>

            <input type="submit" value="Submit">

        </form>
    </div>

@endsection
