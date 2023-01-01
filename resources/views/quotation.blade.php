@extends('layouts.app_par')



@section('content')
<div class="container">




    <!DOCTYPE html>
    <html>



    <head>
        <title>Drugs</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ url('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
        }

        /* The grid: Four equal columns that floats next to each other */
        /* .column {
  float: left;
  width: 25%;
  padding: 10px;
} */

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container */


        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the expanded image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }

        .column-img {}
    </style>

    <body>

        <div style="text-align:center">

        </div>

        <!-- The four columns -->


        <script>
            function myFunction(imgs) {
                var expandImg = document.getElementById("expandedImg");
                var imgText = document.getElementById("imgtext");
                expandImg.src = imgs.src;
                imgText.innerHTML = imgs.alt;
                expandImg.parentElement.style.display = "block";
            }
        </script>

    </body>

    </html>

    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="container" style="">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <img id="expandedImg" src="http://localhost:8000/images/1.jpg" style="width:100%">
                    <div id="imgtext"></div>
                </div>

                <div class="row" id="row-img" style="display: flex; justify-content: center; align-items: center;">



                </div>



            </div>
            <div class="col-6">

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <section class="section--projects">
                            <div class="container">

                                <div class="card">

                                    <div class="card-header">

                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Type below</label>
                                            <input type="text" name="search1" id="search1" placeholder="Enter the key"
                                                class="form-control">
                                        </div>

                                        <div id="alert-div">
                                        </div>

                                        <!-- view record modal -->
                                        <table id="mytable1" class="table table-bordered table-sm table-striped">
                                            <thead>
                                                <tr>
                                                    <th id="1">No</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Precscription ID</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="itemData">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </section>



                        <div class="card">
                            <div class="card-header">{{ __('Item Detials') }}</div>

                            <div class="card-body">
                                <form id="formId" method="POST" action="{{ route('saveItem') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <input id="id" type="hidden" class="form-control" @error('id') is-invalid
                                                @enderror name="id" value="{{ $quo->patient_id }}" required
                                                autocomplete="name" autofocus>

                                            @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">
                                            <input id="name" type="hidden" class="form-control" @error('name')
                                                is-invalid @enderror name="name" value="{{ $quo->patient_name }}"
                                                required autocomplete="name" autofocus>

                                            @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                            __('drug_name') }}</label>

                                        <div class="col-md-6">

                                            <input id="drug_name" type="text"
                                                class="form-control @error('drug_name') is-invalid @enderror"
                                                name="drug_name" required>

                                        </div>


                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-6">

                                            <input id="price" type="hidden"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                required>

                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
                                            __('Qty') }}</label>

                                        <div class="col-md-6">

                                            <input id="qty" type="text"
                                                class="form-control @error('qty') is-invalid @enderror" name="qty"
                                                required>

                                        </div>


                                    </div>


                                    <div class="row mb-3">

                                        <div class="col-md-6">

                                            <input id="total" type="hidden"
                                                class="form-control @error('total') is-invalid @enderror" name="total"
                                                required>
                                            <input id="grossTot" type="hidden"
                                                class="form-control @error('total') is-invalid @enderror"
                                                name="grossTot" required>
                                        </div>
                                    </div>



                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @endif

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4 d-flex align-items-end flex-column">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>

                                            <hr>

                                            <button type="submit" id="save-project-btn" class="btn btn-primary">
                                                {{ __('Send Quotation') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>



    <!DOCTYPE html>
    <html lang="en">
    <style>
        body {
            border: 1px solid red;
            padding: 20px;
            overflow: auto;
        }
    </style>


    <body>

        <section class="section--projects">
            <div class="container">
                <h2 class="text-center mt-5 mb-3">Filter Medicine</h2>
                <div class="card">

                    <div class="card-header">

                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Type below</label>
                            <input type="text" name="search" id="search" placeholder="Enter the key"
                                class="form-control">
                        </div>

                        <div id="alert-div">
                        </div>

                        <!-- view record modal -->
                        <table id="mytable" class="table table-bordered table-sm table-striped">
                            <thead>
                                <tr>
                                    <th id="1">No</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody id="bodyData">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>



        <script type="text/javascript">
            showAllProjects();
            showAllProjects1();
            showItem();

            // imgData += "<h1>Test</h1>";
            // $(".column").html("");

            function showAllProjects1() {

                //  console.log('test');
                let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
                $.ajax({
                    url: "http://localhost:8000/showImage",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        var resultData = dataResult.data;
                        var bodyData = '';
                        var i = 1;
                        let editBtn;
                        $.each(resultData, function (index, row) {



                            var time = row.time;

                            data = row.img_name;

                            const img = data.split(",");

                            console.log(img.length);

                            for (let i = 0; i < img.length; i++) {
                                //   text += cars[i] + "<br>";

                                $("#row-img").append("<div class='column' id='img' style='float: left;width: 25%;'padding: 10px;'><img src='http://localhost:8000/images/" + img[i] + "' alt='Nature' style='width:100%' onclick='myFunction(this);'></div>");

                            }
                        })
                        $("#bodyData").append(bodyData);
                    }
                });
            }



            function showItem() {

                //  console.log('test');
                let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
                $.ajax({
                    url: "http://localhost:8000/showItem",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult.tot);
                        var resultData = dataResult.data;
                        var bodyData = '';
                        var i = 1;
                        let editBtn;
                        $.each(resultData, function (index, row) {

                            var time = row.time;

                            //  var array = time.split(":");

                            //   var time_array = (array[0] + " : " + array[1]);

                            var editUrl = url + '/' + row.id + "/edit";
                            let showBtn = '<button ' +
                                ' class="btn btn-outline-success" ' +
                                ' onclick="">Show' +
                                '</button> ';

                            let editBtn = '<form action="" method="POST">' +

                                '<a  href="home/' + row.id + '/edit">Edit</a></form>';
                            let deleteBtn = '<button ' +
                                ' class="btn btn-outline-danger" ' +
                                ' onclick="">Delete' +
                                '</button>';

                            bodyData += "<tr onclick='get_week(this)' id='" + row.id + "'>"
                            bodyData += "<td>" + row.id + "</td><td>" + row.drug_name +
                                "</td><td>" + row.price + "</td><td>" + row.qty + "</td><td>" + row.prescription_id
                                + "</td><td>" + row.total + "</td>"
                            bodyData += "</tr>";
                            $("#itemData").html("");
                        })
                        bodyData += "<tr><td>Total</td><td></td><td></td><td></td><td></td><td>" + dataResult.tot + "</td></tr>";
                        document.getElementById('grossTot').value = dataResult.tot;
                        $("#itemData").append(bodyData);

                    }
                });
            }

            function showAllProjects() {

                //  console.log('test');
                let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
                $.ajax({
                    url: "http://localhost:8000/patientInfo",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult);
                        var resultData = dataResult.data;
                        //console.log(dataResult.data['tot']);
                        var bodyData = '';
                        var i = 1;
                        let editBtn;
                        $.each(resultData, function (index, row) {

                            var time = row.time;

                            bodyData += "<tr onclick='get_week(this)' id='" + row.price + "'>"
                            bodyData += "<td>" + row.id + "</td><td>" + row.drug_name +
                                "</td><td>" + row.price + "</td>";
                            $("#bodyData").html("");
                        })
                        $("#bodyData").append(bodyData);
                    }
                });
            }


            $(document).ready(function () {




                $('#qty').on('keyup', function () {

                    var price = $('#price').val();
                    var qty = $(this).val();

                    var total = price * qty;
                    document.getElementById('total').value = total;
                    console.log(total);
                    var price = $('#mytable1').find('td:nth-child(3)').text();
                    // tot = price+price;
                    //console.log(tot);
                });
            });
            /*
                submit the form and will be stored to the database
            */

            $(document).ready(function () {
                $('#search').on('keyup', function () {

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
                        success: function (dataResult) {
                            var resultData = dataResult.data;
                            console.log(resultData);
                            var bodyData = '';
                            var i = 1;
                            let editBtn;
                            $.each(resultData, function (index, row) {
                                //   console.log(row.drug_name);
                                var time = row.time;
                                $("#bodyData").html("");



                                bodyData += "<tr onclick='get_week(this)' id='" + row.price + "'>"
                                bodyData += "<td>" + row.id + "</td><td>" + row.drug_name +
                                    "</td><td>" + row.price + "</td>";
                                $("#bodyData").html("");
                            })
                            $("#bodyData").append(bodyData);
                        }
                    });
                });
            });
        </script>
     

        <script>

            let get_week = (ele) => {
                let week = document.getElementById(ele.id);
                document.getElementById('drug_name').value = $(ele).find('td:nth-child(2)').text();
                document.getElementById('price').value = $(ele).find('td:nth-child(3)').text();
                //    alert($(ele).find('td:nth-child(2)').text());

            }

            $('#mytable').delegate('tr', 'click', function () {
                var queryString = window.location.search.substring(1);
                if ($(this).find('th:first').attr('id') != "th") {

                    alert($('#mytable tr:nth-child(this) td:nth-child(2)').text());
                
                }
            });

            $('#mytable').on('click', 'tbody tr', function (event) {
                $(this).addClass('highlight').siblings().removeClass('highlight');
            });




            $("#save-project-btn").click(function (event) {

                event.preventDefault();

                let spanId = $('#getid').val();
                let form = $("#formId");
                let data = {
                    checkId: $("#checkId").val(),
                    getid: $("#getid").val(),
                };

                // if(spanId !== ""){
                // let checkBox = document.getElementById('checkId' + spanId);
                // checkBox.checked = true;
                // }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "http://localhost:8000/saveMaster",
                    type: "POST",
                    data: form.serialize(),
                    //  cache: false,
                    dataType: 'json',

                    success: function (res) {
                        // console.log('hey');
                        if (res.status == false) {
                            $("#save-project-btn").prop('disabled', false);
                            Swal.fire({
                                icon: 'error',
                                title: 'error',
                                text: res.message,
                                footer: ''
                            })
                        } else {

                            Swal.fire({
                                icon: 'info',
                                title: 'Hey',
                                text: res.message,
                                footer: ''
                            })

                        }
                    },
                    error: function (response) {
                        //console.log(res);
                    }
                });
            })

        </script>



        @endsection