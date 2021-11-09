@extends('layouts.app')


@section("content")

                                {{--SUTVARKYTAS--}}

<div class="container">

        {{--klaidos zinutes isvedimas--}}
        @if ($errors->any())
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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT SHOP') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('shop.update', [$shop]) }}" enctype="multipart/form-data">
                            @csrf

                            {{--title--}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('SHOP TITLE') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{$shop->title}}" name="title" autofocus>
                                        @error('title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--description--}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('SHOP DESCRIPTION') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form- control summernote" name="description" value="{{$shop->description}}" required>

                                    </textarea>
                                            @error('description')
                                            <span role="alert" class="invalid-feedback">
                                                <strong>*{{$message}}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>

                           {{--email--}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('SHOP EMAIL') }}</label>
                                <div class="col-md-6">
                                    <input id="email"type="text" class="form-control @error('email') is-invalid @enderror " value="{{$shop->email}}" name="email" autofocus>
                                        @error('email')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>


                            {{--phone--}}
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('SHOP PHONE') }}</label>
                                <div class="col-md-6">
                                    <input id="phone"type="text" class="form-control @error('phone') is-invalid @enderror " value="{{$shop->phone}}" name="phone" autofocus>
                                        @error('phone')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            {{--country--}}
                            <div class="form-group row">
                                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('SHOP COUNTRY') }}</label>
                                <div class="col-md-6">
                                    <input id="country"type="text" class="form-control @error('country') is-invalid @enderror " value="{{$shop->country}}" name="country" autofocus>
                                        @error('country')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>


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
