@extends('layouts.app')

@section('content')

                                    {{--TVARKOMOS PAPILDOMOS FUNKCIJOS--}}

<div class="container">

    {{--error zinute jeigu negalima istrinti--}}
    @if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{session()->get("error_message")}}
    </div>
    @endif

    {{--sekmingo istrynimo zinute--}}
    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('SHOPS') }}</div>

    {{--MYGTUKU LAUKAS--}}
    <table>
        <tr>
        {{--SUKURIMO MYGTUKAS--}}
            <th>
                <form method="GET" action="{{route('shop.create') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit">CREATE NEW SHOP</button>
                </form>
            </th>

        {{--pdf mygtukas--}}
        <th>
            <a class="btn btn-dark" href="{{route('shop.pdf')}}"> Export All SHOPS List to PDF </a>
        <th>

        {{--CATEGORIES MYGTUKAS--}}
        <th>
            <form method="GET" action="{{route('category.index') }}">
                @csrf
                <button class="btn btn-secondary" type="submit">ALL CATEGORIES LIST</button>
            </form>
        </th>

        {{--PRODUCTS MYGTUKAS--}}
        <th>
            <form method="GET" action="{{route('product.index') }}">
                @csrf
                <button class="btn btn-secondary" type="submit">ALL PRODUCTS LIST</button>
            </form>
        </th>


        </tr>
    </table>


    <table class="table table-striped table-hover table-sm">
        <tr>

            <tr class="table-secondary">
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('description', 'Description' )</th>
                <th>@sortablelink('email', 'Email' )</th>
                <th>@sortablelink('phone', 'Phone' )</th>
                <th>@sortablelink('country', 'Country' )</th>
                <th>ACTIONS</th>
            </tr>


        @foreach ($shops as $shop)

                <td> {{$shop->id }}</td>
                <td> {{$shop->title}}</td>
                <td> {{$shop->description}}</td>
                <td> {{$shop->email}}</td>
                <td> {{$shop->phone}}</td>
                <td> {{$shop->country}}</td>

                    <td>
                        <th><a class="btn btn-warning" href="{{route('shop.show', [$shop]) }}">SHOW</a></th>
                        <th><a class="btn btn-info" href="{{route('shop.edit', [$shop]) }}">EDIT</a></th>

                        <th>
                        <form method="POST" action="{{route('shop.destroy', [$shop]) }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                        </th>
                    </td>
        </tr>

        @endforeach

            </table>

                {{--puslapiu atvaizdavimas puslapio apacioje--}}
               {!! $shops->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

</div>



@endsection
