@extends('layouts.app')

@section('content')
                                 {{--SUTVARKYTAS--}}

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



    @error('author_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW SHOP') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('shop.store')}}" enctype="multipart/form-data">

                        {{--title--}}
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('SHOP TITLE') }}</label>
                            <div class="col-md-6">
                                <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                         {{--description--}}
                         <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">{!!'SHOP DESCRIPTION'!!}</label>

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

                        {{--Email--}}
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label" >{{ __('SHOP EMAIL') }}</label>
                            <div class="col-md-6">
                                <input id="email"type="text" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" name="email" autofocus>
                                @error('email')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--phone--}}
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label" >{{ __('SHOP PHONE') }}</label>
                            <div class="col-md-6">
                                <input id="phone"type="text" class="form-control @error('phone') is-invalid @enderror " value="{{ old('phone') }}" name="phone" autofocus>
                                @error('phone')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{--country--}}
                        <div class="form-group row">
                            <label for="country" class="col-sm-3 col-form-label" >{{ __('SHOP COUNTRY') }}</label>
                            <div class="col-md-6">
                                <input id="country"type="text" class="form-control @error('country') is-invalid @enderror " value="{{ old('country') }}" name="country" autofocus>
                                @error('country')
                                <span role="alert" class="invalid-feedback">
                                    <strong>*{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                        <button class="btn btn-info" type="submit">SAVE NEW SHOP</button>

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
