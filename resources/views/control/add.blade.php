@extends('layouts.control')
@section('title','Add Advertise')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Course') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{route('control.store',['advertise'=>$advertise])}}" method="post"
                              enctype="multipart/form-data">
                            @include('control.form')
                            <button type="submit" class="btn btn-dark col-md-2 container">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
