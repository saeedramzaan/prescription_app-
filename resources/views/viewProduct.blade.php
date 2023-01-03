@extends('layouts.app_par')



@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center" style="display: flex; justify-content:center">
                <h2>Update Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="http://localhost:8000/product/create"> Add Product </a>
            </div>

        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="display: flex; justify-conent:center">
            <p>{{ $message }}</p>
        </div>
    @endif



    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Duration</th>
            <th>Day</th>
        </tr>

        @foreach ($products as $pro)
            <tr>


                <td>{{ $pro->id }}</td>
                <td> {{ $pro->drug_name }} </td>
                <td> {{ $pro->qty }} </td>
                <td>{{ $pro->price }}</td>
                <td>

                    <form action="" method="POST">

                        <a class="btn btn-primary" href="{{ route('product.edit', $pro->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('del', $pro->id) }}">Delete</a>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>
@endsection
