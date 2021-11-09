@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMATION ABOUT PRODUCT') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                            <label for="product_id" class="col-sm-3 col-form-label" >{{ __('PRODUCT ID') }}</label>
                                <div class="col-md-6">
                                    <p>{{$product->id}}</p>
                                </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('PRODUCT TITLE') }}</label>
                                <div class="col-md-6">
                                    <p>{{$product->title}}</p>
                                </div>
                        </div>


                        <div class="form-group row">
                            <label for="excertpt " class="col-sm-3 col-form-label" >{{ __('PRODUCT excertpt')}}</label>
                                <div class="col-md-6">
                                    <p>{!!$product->excertpt!!}</p>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label" >{{ __('PRODUCT DESCRIPTION')}}</label>
                                <div class="col-md-6">
                                    <p>{!!$product->description!!}</p>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label" >{{ __('PRODUCT PRICE') }}</label>
                                <div class="col-md-6">
                                    <p>{{$product->price}}</p>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label" >{{ __('Product Image') }}</label>
                            <div class="col-md-6">
                                <img src="{{$product->image}}" alt="{{$product->title}}" style="width:200px">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label" >{{ __('SHOP Category')}}</label>
                            <div class="col-md-6">
                                <p>{{$product->productCategory->title}}</p>
                            </div>
                        </div>

                    {{--vienos kategorijos sugeneravimas PDF--}}
                    <a href="{{route('product.pdfproduct', [$product])}}" class="btn btn-dark">EXPORT PRODUCT TO PDF</a>
                    {{--gryzimas i visa sarasa --}}
                    <a class="btn btn-info" href="{{route('product.index') }}">BACK TO PRODUCTS LIST</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

