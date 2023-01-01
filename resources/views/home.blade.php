
@extends('layouts.app')

@section('content')

<style>
    body {
        border: 1px solid red;
        padding: 20px;
        overflow:auto;
    }
</style>

  <title> Add Prescription</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


  <script src="http://code.jquery.com/jquery.min.js"></script>
     
    </div>

  <div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif


        <h3 class="jumbotron">Add Prescription</h3>
<form method="post" action="{{route('form')}}" enctype="multipart/form-data">
  {{csrf_field()}}


        <div class="input-group control-group increment" style="padding-bottom: 20px">
          <input type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>

    
        <div class="row mb-3" style="padding-bottom: 20px">
            <label for="name"
                class="col-md-4 col-form-label text-md-end">{{ __('Delivery Address') }}</label>

            <div class="col-md-6">
                <input id="address" type="text"
                    class="form-control @error('name') is-invalid @enderror" name="address"
                    value="{{ old('delivery address') }}" required autocomplete="delivery_address" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="row mb-3 pb-3" style="padding-bottom: 20px">
            <label for="name"
                class="col-md-4 col-form-label text-md-end">{{ __('Note') }}</label>

            <div class="col-md-6">
                <input id="note" type="text"
                    class="form-control @error('Note') is-invalid @enderror" name="note"
                    value="{{ old('Note') }}" required autocomplete="note" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3" style="padding-bottom: 20px">
            <label for="name"
                class="col-md-4 col-form-label text-md-end">{{ __('Delivery time') }}</label>

            <div class="col-md-6">
                <input id="delivery_time" type="text"
                    class="form-control @error('delivery_time') is-invalid @enderror" name="delivery_time"
                    value="{{ old('delivery time') }}" required autocomplete="delivery_time" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="filename[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>        
  </div>


<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });


    

</script>


<script type="text/javascript">
    showAllProjects();

    let get_week = (ele) => {
                let week = document.getElementById(ele.id);
                document.getElementById('id').value = $(ele).find('td:nth-child(1)').text();
                document.getElementById('name').value = $(ele).find('td:nth-child(2)').text();
                //    alert($(ele).find('td:nth-child(2)').text());

            }

    function showAllProjects() {

        //  console.log('test');
         let url = $('meta[name=app-url]').attr("content") + "/patientInfo";
        $.ajax({
            url: "http://localhost:8000/infoIndex",
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

                    bodyData += "<tr onclick='get_week(this)'>"
                    bodyData += "<td>" + row.appointment_no + "</td><td>" + row.name +
                        "</td><td>" + row.email + "</td><td>" + row.address + "</td><td>" + row
                        .mobile_no + "</td><td>" + row.date + "</td>";
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

@endsection
