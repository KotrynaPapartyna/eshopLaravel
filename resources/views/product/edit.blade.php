@extends('layouts.app')

@section("content")

    <div class="container">

        {{--zinute apie neuzpildytus laukus--}}
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


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT PRODUCT') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('product.update', [$product]) }}" enctype="multipart/form-data">
                            @csrf

                            {{--title--}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('PRODUCT TITLE') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{$product->title}}" name="title" autofocus>
                                        @error('title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--excertpt --}}
                            <div class="form-group row">
                                <label for="excertpt " class="col-md-4 col-form-label text-md-right">{{ __('PRODUCT excertpt ') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form- control summernote" name="excertpt" value="{!!$product->excertpt !!}" required>

                                    </textarea>
                                            @error('excertpt ')
                                            <span role="alert" class="invalid-feedback">
                                                <strong>*{{$message}}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>


                            {{--DESCRIPTION--}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('CATEGORY DESCRIPTION') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form- control summernote" name="description" value="{!!$category->description!!}" required>

                                    </textarea>
                                            @error('description')
                                            <span role="alert" class="invalid-feedback">
                                                <strong>*{{$message}}</strong>
                                            </span>
                                            @enderror
                                </div>
                            </div>

                            {{--price--}}
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('PRODUCT PRICE') }}</label>
                                <div class="col-md-6">
                                    <input id="price"type="text" class="form-control @error('price') is-invalid @enderror " value="{{$product->price}}" name="price" autofocus>
                                        @error('price')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--image--}}
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('PRODUCT IMAGE') }}</label>
                                <div class="col-md-6">
                                    <input id="image"type="text" class="form-control @error('image') is-invalid @enderror " value="{{$product->image}}" name="image" autofocus>
                                        @error('image')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--kategorijos parinkimas--}}
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('CATEGORY') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_id">

                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>--}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('SAVE') }}
                                    </button>
                                </div>
                            </div>
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
