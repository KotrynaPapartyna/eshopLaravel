@extends('layouts.app')

@section('content')
                                    {{--SUTVARKYTAS--}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT SHP') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="shop_id" class="col-sm-3 col-form-label" >{{ __('Shop ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->id}}</p>
                        </div>
                    </div>

                    {{--shop pavadinimas--}}
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label" >{{ __('Shop Title') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->title}}</p>
                        </div>
                    </div>

                    {{--shop aprasymas--}}
                    <div class="form-group row">
                        <label for="description " class="col-sm-3 col-form-label" >{{ __('Shop description ') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->description}}</p>
                        </div>
                    </div>

                    {{--shop email--}}
                    <div class="form-group row">
                        <label for="email  " class="col-sm-3 col-form-label" >{{ __('Shop email') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->email}}</p>
                        </div>
                    </div>

                    {{--shop phone --}}
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label" >{{ __('Shop phone') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->phone }}</p>
                        </div>
                    </div>

                    {{--shop country --}}
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label" >{{ __('Shop country') }}</label>
                        <div class="col-md-6">
                            <p>{{$shop->country}}</p>
                        </div>
                    </div>

                     {{--vieno shop sugeneravimas i pdf --}}
                    <a href="{{route('shop.pdfshop', [$shop])}}" class="btn btn-dark">Export Shop to PDF</a>

                    {{--gryzimas i visa sarasa --}}
                    <a class="btn btn-info" href="{{route('shop.index') }}">Back To Shop List</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
