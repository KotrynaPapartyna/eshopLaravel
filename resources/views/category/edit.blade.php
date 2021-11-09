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
                    <div class="card-header">{{ __('EDIT/CHANGE INFORMATION ABOUT CATEGORY') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('category.update', [$category]) }}" enctype="multipart/form-data">
                            @csrf

                            {{--title--}}
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('CATEGORY TITLE') }}</label>
                                <div class="col-md-6">
                                    <input id="title"type="text" class="form-control @error('title') is-invalid @enderror " value="{{$category->title}}" name="title" autofocus>
                                        @error('title')
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

                            {{--shop parinkimas--}}
                            <div class="form-group row">
                                <label for="shop_id" class="col-md-4 col-form-label text-md-right">{{ __('SHOP') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="shop_id">

                                        @foreach ($shops as $shop)
                                            <option value="{{$shop->id}}" @if($shop->id == $category->shop) selected @endif >{{$shop->title}}</option>
                                        @endforeach
                                    </select>
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
