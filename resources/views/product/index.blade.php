@extends('layouts.app')

@section('content')

<div class="container">

                                    {{--TVARKOMOS PAPILDOMOS FUNKCIJOS--}}

    <div class="ajaxForm">

        <div class="form-group row">
            <label for="productTitle" class="col-md-4 col-form-label text-md-right">PRODUCT TITLE</label>
            <input class="form-control col-md-4" type="text" name="productTitle" id="productTitle"/>
            <span class="invalid-feedback productTitle" role="alert">
            </span>
        </div>

        <div class="form-group row">
            <label for="productExcertpt" class="col-md-4 col-form-label text-md-right">PRODUCT Excertpt</label>
            <textarea class="form-control col-md-4" name="productExcertpt" id="productExcertpt">
            </textarea>
            <span class="invalid-feedback productExcertpt" role="alert">
            </span>
        </div>

        <div class="form-group row">
            <label for="productDescription" class="col-md-4 col-form-label text-md-right">PRODUCT DESCRIPTION</label>
            <textarea class="form-control col-md-4" name="productDescription" id="productDescription">
            </textarea>
            <span class="invalid-feedback productDescription" role="alert">
            </span>
        </div>

        <div class="form-group row">
            <label for="productPrice" class="col-md-4 col-form-label text-md-right">PRODUCT PRICE</label>
            <input class="form-control col-md-4" type="text" name="productPrice" id="productPrice"/>
            <span class="invalid-feedback productPrice" role="alert">
            </span>
        </div>


        <div class="form-group row">
            <label for="productImage" class="col-md-4 col-form-label text-md-right">PRODUCT IMAGE</label>
            <input class="form-control col-md-4" type="text" name="productImage" id="productImage"/>
            <span class="invalid-feedback productImage" role="alert">
            </span>
        </div>


        <div class="form-group row">
            <label for="category_id" class="col-md-4 col-form-label text-md-right">CATEGORY ID</label>
            <input class="form-control col-md-4" type="text" name="category_id" id="category_id" />
            <span class="invalid-feedback category_id" role="alert">
            </span>
        </div>

        <div class="form-group row">
            <button class="btn btn-primary" type="submit" id="add" >ADD SHOP WITH AJAX</button>
        </div>

    </div>


    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('PRODUCT') }}</div>



    {{--MYGTUKU LAUKAS--}}

    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('product.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW PRODUCT</button>
                </form>
            </th>

            {{-- visu productu sugeneravimas i PDF--}}
            <th>
                <a class="btn btn-dark" href="{{route('product.pdf')}}"> Export All Products List to PDF </a>
            <th>


            {{--SHOPS MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('shop.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL SHOPS LIST</button>
                </form>
            </th>

            {{--CATEGORIES MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('category.index') }}">
                    @csrf
                    <button class="btn btn-secondary" type="submit">ALL CATEGORIES LIST</button>
                </form>
            </th>


        {{--filtravimas pagal pavadinima--}}
        <th>
            <form method="GET" action="{{route('product.index') }}">
                @csrf
                <select name="productTitle">
                    @foreach ($products as $product)
                        <option value="{{$product->title}}">{{$product->title}}</option>
                    @endforeach
                </select>
                <button type="submit">FILTER BY PRODUCT TITLE</button>
            </form>
        </th>

        <th><a href="{{route('product.index')}}" class="btn btn-success">CLEAR FILER</a></th>



        </tr>
    </table>




   <table class="table table-striped table-hover table-sm">
       <tr>

           <tr class="table-secondary">
               <th>@sortablelink('id', 'ID')</th>
               <th>@sortablelink('title', 'Title')</th>
               <th>@sortablelink('excertpt ', 'Excertpt ' )</th>
               <th>@sortablelink('description', 'Description' )</th>
               <th>@sortablelink('price', 'Price' )</th>
               <th>@sortablelink('category_id', 'Category' )</th>
               <th>ACTIONS</th>
           </tr>


       @foreach ($products as $product)

               <td> {{$product->id }}</td>
               <td> {{$product->title }}</td>
               <td> {{$product->excertpt }}</td>
               <td> {{$product->description}}</td>
               <td> {{$product->price}}</td>
               <td> {{$product->productCategory->title}}</td>



                   <td>
                       <th><a class="btn btn-warning" href="{{route('product.show', [$product]) }}">SHOW</a></th>
                       <th><a class="btn btn-info" href="{{route('product.edit', [$product]) }}">EDIT</a></th>

                       <th>
                       <form method="POST" action="{{route('product.destroy', [$product]) }}">
                           @csrf
                           <button class="btn btn-danger" type="submit">DELETE</button>
                       </form>
                       </th>

                   </td>
       </tr>

       @endforeach


           </table>

              {!! $products->appends(Request::except('page'))->render() !!}
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
