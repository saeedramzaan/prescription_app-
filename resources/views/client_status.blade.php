@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
     

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Status') }}</div>

                    <div class="card-body">
                        <form id="formId" method="POST" action="{{ route('masterUpdate') }}">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('id') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" @error('id') is-invalid @enderror name="id"
                                        value=""
                                        required autocomplete="name" autofocus>

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                            </div>           

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                                <div class="col-md-6">

                                  

                                    <select class="form-control" name="status" id="status">
                                      <option value="none">None</option>
                                      <option value="Accept">Accept</option>
                                      <option value="Reject">Reject</option>
                                    </select>

                                </div>


                            </div>

                           


                            
                            


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                  
                                </div>
                            </div>
                        </form>
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
                overflow:auto;
            }
        </style>
    <head>
        <title>Update Status</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ url('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <section class="section--projects">
            <div class="container">
                <h2 class="text-center mt-5 mb-3">Filter Prescriptions</h2>
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
                                    <th id="1">Prescription ID</th>
                                    <th>Patient Name</th>
                                    <th>Total</th>
                                    <th>Status</th>
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
           

            function showAllProjects() {

                //  console.log('test');
                let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
                $.ajax({
                    url: "http://localhost:8000/masterInfo",
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function(dataResult) {
                          console.log(dataResult);
                        var resultData = dataResult.data;
                        //console.log(dataResult.data['tot']);
                        var bodyData = '';
                        var i = 1;
                        let editBtn;
                        $.each(resultData, function(index, row) {

                            var time = row.time;

                          //  var array = time.split(":");

                         //   var time_array = (array[0] + " : " + array[1]);

                            
                          
                           

                            bodyData += "<tr onclick='get_week(this)' id='"+row.patient_id+"'>"
                            bodyData += "<td>" + row.prescription_id + "</td><td>" + row.patient_name +
                                "</td><td>" + row.total + "</td><td>" + row.status + "</td>"
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

         
        </script>
     


       
    </body>

    </html>
    <style>
.table-striped tbody tr:nth-child(odd) td {
    background-color: green;
}
.table-striped tbody tr.highlight td {
    background-color: red;
}
        </style>
    <script>

   let get_week = (ele) => {
    let week = document.getElementById(ele.id);

   document.getElementById('id').value = $(ele).find('td:nth-child(1)').text();
//    alert($(ele).find('td:nth-child(2)').text());

}

// $('#mytable').delegate('tr','click',function () {
//                                 var queryString = window.location.search.substring(1);
//                                 if ($(this).find('th:first').attr('id') != "th") {

//                                   //  alert($('#mytable tr:nth-child(this) td:nth-child(2)').text());
//                                    // console.log($(this).find('td:second').text());
//                                     window.opener.document.getElementById(queryString).value = $(this).find('td:first').text();
//                                  window.close();
//                                 }
//             });

//    $('#mytable').on('click', 'tbody tr', function (event) {
//     $(this).addClass('highlight').siblings().removeClass('highlight');
// });



function getRow() {
    return $('table > tbody > tr.highlight');
}



$('#btn').click(function (e) {
    var selrow = getRow();
    console.log(selrow);
    
    // document.querySelector('input[name="day"]').value = 'Whatever you want!';
    if (selrow != undefined){
        alert(selrow.attr('id'));
     

    }else{
        alert('undefined');
    }
});

    
    
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

                                // var time_array = (array[0] + " : " + array[1]);

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
                                    "</td><td>" + row.drug_name + "</td>"
                                bodyData += "</tr>";
                                $("#bodyData").html("");
                            })
                            $("#bodyData").append(bodyData);
                        }
                    });
                });
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
