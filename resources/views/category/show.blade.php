@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT CATEGORY') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label" >{{ __('CATEGORY ID') }}</label>
                        <div class="col-md-6">
                            <p>{{$category->id}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label" >{{ __('CATEGORY TITLE') }}</label>
                        <div class="col-md-6">
                            <p>{{$category->title}}</p>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label" >{{ __('CATEGORY DESCRIPTION')}}</label>
                        <div class="col-md-6">
                            <p>{!!$category->description!!}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="shop_id" class="col-sm-3 col-form-label" >{{ __('SHOP Category')}}</label>
                        <div class="col-md-6">
                            <p>{{$category->categoryShop->title}}</p>
                        </div>
                    </div>

                    {{--vienos kategorijos sugeneravimas PDF--}}
                    <a href="{{route('category.pdfcategory', [$category])}}" class="btn btn-dark">EXPORT CATEGORY TO PDF</a>
                    {{--gryzimas i visa sarasa --}}
                    <a class="btn btn-info" href="{{route('category.index') }}">BACK TO CATEGORIES LIST</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
