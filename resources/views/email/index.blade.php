@extends('layouts.app')
@section('content')


    <div class="container">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Text</th>
                </tr>

                @foreach($emails as $row)
                    <tr>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['email']}}</td>
                        <td>
                            <textarea name="" id="" cols="35" rows="2">{{ $row['text'] }}</textarea>
                        </td>
                    </tr>
                @endforeach


            </table>




    </div>


@endsection
