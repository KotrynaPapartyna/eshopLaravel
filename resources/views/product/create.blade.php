@extends('layouts.app')

@section('content')

<div class="container">


    @if ($errors->any())
    {{-- klaidu bus daugau nei 1 --}}

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <ul>
                <li>{{$error}}</li>
            </ul>
        </div>
        @endforeach
    @endif


    @error('product_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW PRODUCT') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">

                        {{--Title--}}
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('PRODUCT TITLE') }}</label>
                            <div class="col-md-6">
                                <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--excertpt --}}
                        <div class="form-group row">
                            <label for="excertpt " class="col-sm-3 col-form-label">{!!'PRODUCT EXCERTPT'!!}</label>

                            <div class="col-md-6">
                                <textarea class="form- control summernote" name="excertpt " required>

                                </textarea>
                                        @error('excertpt ')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>


                        {{--description--}}
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">{!!'CATEGORY DESCRIPTION'!!}</label>

                            <div class="col-md-6">
                                <textarea class="form- control summernote" name="description" required>

                                </textarea>
                                        @error('description')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                            </div>
                        </div>

                        {{--PRICE--}}
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label" >{{ __('PRODUCT PRICE') }}</label>
                            <div class="col-md-6">
                                <input id="price"type="text" class="form-control @error('price') is-invalid @enderror " value="{{ old('price') }}" name="price" autofocus>
                                @error('price')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--img--}}
                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">{{ __('PRODUCT IMAGE') }}</label>
                        <div class="col-md-6">
                            <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div>


                          {{--category parinkimas
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-3 col-form-label">{{ __('CATEGORY') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category_id">

                                    @foreach ($categories $category)

                                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}

                        </div>

                        <button class="btn btn-info" type="submit">SAVE NEW PRODUCT</button>

                        @csrf

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
    $('.summernote').summernote();
    });
</script>

@endsection
