@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-sm-4 bg-white">
        <div class="container-fluid bg-light">

            <div class="row align-center">

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <hr class="bg-secondary">
                    <div class="pull-left">
                        <h2><b>Detail</b></h2>
                    </div>
                    <hr class="bg-secondary">
                </div>
            </div>

            {{--            <div class="row">--}}
            {{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
            {{--            <div class="pull-left">--}}
            {{--                <h3> <b>{{ $company->name }}</b></h3>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--    </div>--}}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <table cellpadding="10" class="table table-bordered col">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Web Site</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Date Created</th>

                        </tr>
                        </thead>
                        <tr>
                            <td class="text-center"><img src="{{$company->logo_image}}" alt=""
                                                         style="width: 80px; height: 80px"></td>
                            <td class="text-center">{{$company->name}}</td>
                            <td class="text-center">{{$company->email}}</td>
                            <td class="text-center">{{$company->website}}</td>
                            <td class="text-center">{{$company->phone}}</td>
                            <td class="text-center">{{$company->address}}</td>
                            <td class="text-center">{{date_format($company->created_at, 'jS M Y') }}</td>


                        </tr>

                    </table>
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <a href="{{ route('company.index') }}" class="btn btn-dark" title="Back">Back</a>
            </div>
            <br>
        </div>
    </div>
@endsection
