@extends('layouts.app_par')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Item Details</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ url('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
 
    <body>

        <script type="text/javascript">
            showAllProjects();

            function showAllProjects() {

                //  console.log('test');
                let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
                $.ajax({
                    url: "http://localhost:8000/indexInfo",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function(dataResult) {
                        //   console.log(dataResult);
                        var resultData = dataResult.data;
                        var bodyData = '';
                        var i = 1;
                        let editBtn;
                        $.each(resultData, function(index, row) {

                            var time = row.time;

                         //   var array = time.split(":");

                          //  var time_array = (array[0] + " : " + array[1]);

                            var editUrl = url + '/' + row.id + "/edit";
                            let showBtn = '<button ' +
                                ' class="btn btn-outline-success" ' +
                                ' onclick="">Show' +
                                '</button> ';

                            let editBtn = '<button ' +
                                ' class="btn btn-outline-success" ' +
                                ' onclick="">Edit' +
                                '</button> ';
                            let deleteBtn = '<button ' +
                                ' class="btn btn-outline-danger" ' +
                                ' onclick="">Delete' +
                                '</button>';

                            bodyData += "<tr>"
                            bodyData += "<td>" + row.patient_id + "</td><td>" + row.patient_name +
                                "</td><td>" + row.prescription_id + "</td><td>" + row.status + "</td>";
                            bodyData += "</tr>";
                            $("#bodyData").html("");
                        })
                        $("#bodyData").append(bodyData);
                    }
                });
            }


            /*
                submit the form and will be stored to the database
            */

            $(document).ready(function() {
                $('#search').on('keyup', function() {
                    var query = $(this).val();
                    let url = $('meta[name=app-url]').attr("content") + "/projects";
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "http://localhost:8000/search",
                        type: "GET",
                        cache: false,
                        data: {
                            'name': query
                        },
                        dataType: 'json',
                        success: function(dataResult) {
                            var resultData = dataResult.data;
                            var bodyData = '';
                            var i = 1;
                            let editBtn;
                            $.each(resultData, function(index, row) {

                                var time = row.time;

                               // var array = time.split(":");

                              //  var time_array = (array[0] + " : " + array[1]);

                                var editUrl = url + '/' + row.appointment_no + "/edit";
                                let showBtn = '<button ' +
                                    ' class="btn btn-outline-success" ' +
                                    ' onclick="">Show' +
                                    '</button> ';

                                let editBtn = '<button ' +
                                    ' class="btn btn-outline-success" ' +
                                    ' onclick="">Edit' +
                                    '</button> ';
                                let deleteBtn = '<button ' +
                                    ' class="btn btn-outline-danger" ' +
                                    ' onclick="">Delete' +
                                    '</button>';
                                bodyData += "<tr>"
                                bodyData += "<td>" + i++ + "</td><td>" + row.name +
                                    "</td><td>" + row.email + "</td><td>" + row.address +
                                    "</td><td>" + row.mobile_no + "</td><td>" + row.date +
                                    "</td>"
                                bodyData += "</tr>";
                                $("#bodyData").html("");
                            })
                            $("#bodyData").append(bodyData);
                        }
                    });
                });
            });
        </script>
      
    </body>

    </html>
@endsection

