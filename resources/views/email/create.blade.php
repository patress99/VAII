


@extends('layouts.app')
@section('content')

    <div class="container">

        @if(count($errors) > 0)
            <div class="form-group text-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="form-group alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <form method="post" action="{{url('email')}}">
            @csrf
            <label for="lname">Meno a priezvisko</label>
            <input type="text" id="lname" name="name" placeholder="Vaše priezvisko.." value="{!! @Auth::user()->name !!}">

            <label for="lname">Email</label>
            <input type="text" id="email" name="email" placeholder="Váš email.." value="{!! @Auth::user()->email !!}">

            <label for="country">Krajina</label>

            <select id="country" name="country">
                <option value="sk">Slovensko</option>
                <option value="cz">Česká republika</option>
            </select>

            <label for="subject">Predmet</label>
            <textarea id="subject" name="text" placeholder="Napíšte nám.." style="height:200px"></textarea>

            <input type="submit" value="Submit">

        </form>

    </div>

@endsection
