@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Emails') }}</div>

                <div class="card-body">


                    <input class="btn btn-primary btn-sm " value='Show records' id='fetchAllRecord'>
                    <table id='userTable' class="table">
                        <thead>
                        <tr>
                            <th>ID of email</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Text</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <script src="js/jquery.js"></script>
                    <script type='text/javascript'>

                        $(document).ready(function(){

                            $('#fetchAllRecord').click(function(){
                                fetchRecords(0);
                            });


                        });
                        function fetchRecords(id){
                            $.ajax({
                                url: 'getData/'+id,
                                type: 'get',
                                dataType: 'json',
                                success: function(response){
                                    var len = 0;
                                    $('#userTable tbody').empty(); // Empty <tbody>
                                    if(response['data'] != null){
                                        len = response['data'].length;
                                    }
                                    if(len > 0){

                                        for(var i=0; i<len; i++){

                                            var name = response['data'][i].name;
                                            var id = response['data'][i].id;
                                            var email = response['data'][i].email;
                                            var text = response['data'][i].text;
                                            var url = '{{ route("email.delete", ":id") }}';
                                            url = url.replace(':id', id);
                                            $row = id;
                                            var tr_str = "<tr>" +
                                                "<td>" + $row + "</td>" +
                                                "<td>" + name + "</td>" +
                                                "<td>" + email + "</td>" +
                                                "<td>" + text + "</td>" +

                                                "<td><a class='btn btn-danger btn-sm' href=" + url + " }} </a>Zmazať</td>" +
                                                "</tr>";
                                            $("#userTable tbody").append(tr_str);


                                        }
                                    }

                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
