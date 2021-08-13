@extends('layouts.app')

 @section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-secondary float-right" href="{{route('company.create')}}"><u> + Create New Company </u></a>
                <h2><b>COMPANIES</b></h2>

            </div>
        </div>
    </div>
<hr>

     @if($message=Session::get('Success'))
         <div class="alert alert-success">
             <p>{{$message}}</p>"
         </div>
     @endif

    <table class="table table-bordered" id="companies">
        <thead>
        <tr>
            <th><u>Id</u></th>
            <th><u>Image</u></th>
            <th><u>Name</u></th>
            <th><u>Email</u></th>
            <th><u>Web</u></th>
            <th><u>Phone</u></th>
            <th><u>Address</u></th>
            <th width="150px"><u>Action</u></th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td><img src="{{$company->logo_image}}" alt="" style="width: 65px; height: 65px"></td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->address}}</td>
                <td>

                    <form action="{{route('company.destroy',$company->id)}}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{route('company.show',$company->id)}}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{route('company.edit',$company->id)}}">Edit</a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
             </tr>
        @endforeach
        </tbody>

    </table>
        <script>
            $(document).ready( function () {
                $('#companies').DataTable();
            } );
        </script>

{{--    {{$companies->links('vendor.pagination.bootstrap-4')}}--}}

 @endsection
