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


    @error('category_id')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREATE NEW CATEGORY') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">

                        {{--Title--}}
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label" >{{ __('CATEGORY TITLE') }}</label>
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

                          {{--parduotuves parinkimas
                        <div class="form-group row">
                            <label for="author_id" class="col-sm-3 col-form-label">{{ __('Author') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="author_id">

                                    @foreach ($authors as $author)

                                        <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif >{{$author->name}} {{$author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}

                        </div>

                        <button class="btn btn-info" type="submit">SAVE NEW CATEGORY</button>

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
