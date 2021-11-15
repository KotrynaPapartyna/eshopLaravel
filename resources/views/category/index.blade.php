@extends('layouts.app')

@section('content')

<div class="container">

                                     {{--TVARKOMOS PAPILDOMOS FUNKCIJOS--}}

    <div class="ajaxForm category">

        <div class="form-group row">
            <label for="categoryTitle" class="col-md-4 col-form-label text-md-right">Category Title</label>
            <input class="form-control col-md-4" type="text" name="categoryTitle" id="categoryTitle"/>
                <span class="invalid-feedback categoryTitle" role="alert">
                </span>
        </div>

        <div class="form-group row">
            <label for="categoryDescription" class="col-md-4 col-form-label text-md-right">Category Description</label>
            <textarea class="form-control col-md-4" name="categoryDescription" id="categoryDescription">
            </textarea>
                <span class="invalid-feedback categoryDescription" role="alert">
                </span>
        </div>

        {{--sutvarkyti kad veiktu--}}
        <div class="form-group row">
            <label for="categoryShop" class="col-md-4 col-form-label text-md-right">Category Shop</label>
                <input class="form-control col-md-4" type="text" name="categoryShop" id="categoryShop"/>
            <span class="invalid-feedback categoryShop" role="alert">
            </span>
        </div>

        <div class="form-group row">
            <button class="btn btn-primary" type="submit" id="add" >ADD CATEGORY WITH AJAX </button>
        </div>

    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('CATEGORY') }}</div>



    {{--MYGTUKU LAUKAS--}}

    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('category.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW CATEGORY</button>
                </form>
            </th>

            {{-- visu autoriu ir knygu sugeneravimas i PDF--}}
            <th>
                <a class="btn btn-dark" href="{{route('category.pdf')}}"> Export All Categories List to PDF </a>
            <th>


            {{--SHOPS MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('shop.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL SHOPS LIST</button>
                </form>
            </th>

            {{--PRODUCTS MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('product.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL PRODUCTS LIST</button>
                </form>
            </th>


        {{--filtravimas pagal pavadinima--}}
        <th>
            <form method="GET" action="{{route('category.index') }}">
                @csrf
                <select name="categoryTitle">
                    @foreach ($categories as $category)
                        <option value="{{$category->title}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button type="submit">FILTER BY CATEGORY TITLE</button>
            </form>
        </th>

        <th><a href="{{route('category.index')}}" class="btn btn-success">CLEAR FILER</a></th>
        </tr>
    </table>



    <table class="table table-striped table-hover table-sm">
        <tr>

            <tr class="table-secondary">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'TITLE')</th>
                <th>@sortablelink('description', 'DESCRIPTION' )</th>
                <th>@sortablelink('shop_id', 'Shop' )</th>
                <th>ACTIONS</th>
            </tr>


        @foreach ($categories as $category)

                <td> {{$category->id }}</td>
                <td> {{$category->title }}</td>
                <td> {{$category->description}}</td>
                <td> {{$category->categoryShop->title}}</td>

                    <td>
                        <th><a class="btn btn-warning" href="{{route('category.show', [$category]) }}">SHOW</a></th>
                        <th><a class="btn btn-info" href="{{route('category.edit', [$category]) }}">EDIT</a></th>

                        <th>
                        <form method="POST" action="{{route('category.destroy', [$category]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                        </th>

                    </td>
        </tr>

        @endforeach


            </table>

               {!! $categories->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>

<script>
//AJAXUI
</script>


<script>
    $(document).ready(function() {
    $('.summernote').summernote();
    });
</script>



@endsection
