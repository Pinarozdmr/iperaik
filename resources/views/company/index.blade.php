@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-secondary float-right" href="{{route('company.create')}}"><u> + Create New
                        Company </u></a>
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
            <th><u>Image</u></th>
            <th><u>Name</u></th>
            <th><u>Email</u></th>
            <th><u>Web</u></th>
            <th><u>Phone</u></th>
            <th><u>Address</u></th>
            <th width="95px"><u>Action</u></th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td><img src="{{$company->logo_image}}" alt="" style="width: 65px; height: 65px"></td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->website}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->address}}</td>
                <td>

                    <form action="{{route('company.destroy',$company->id)}}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{route('company.show',$company->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg></a>
                        <a class="btn btn-success btn-sm" href="{{route('company.edit',$company->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a>

                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <script>
        $(document).ready(function () {
            $('#companies').DataTable();
        });
    </script>

    {{--    {{$companies->links('vendor.pagination.bootstrap-4')}}--}}

@endsection
