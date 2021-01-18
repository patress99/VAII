@extends('layouts.app')
@section('content')


    <div class="container">

        <input type='button' value='Fetch all records' id='fetchAllRecord'>
        <table id='userTable' class="table table-bordered">
            <thead>
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Text</th>
                <th>ID</th>
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


@endsection
