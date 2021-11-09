@extends('layouts.app')

@section('content')

<div class="container">


    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif


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

        {{--PAIESKOS FORMA
            <th>
                <form action="{{route("book.search")}}" method="GET">
                    @csrf
                    <input type="text" name="search" placeholder="Enter searc key"/>
                    <button type="submit">SEARCH</button>
                </form>
            </th>
        --}}

        </tr>
    </table>

    {{--RIKIAVIMO FORMA
    <form action="{{route('book.index')}}" method="GET">
        @csrf
        <select name="collumnname">
            {{--jeigu gautas kintamasis yra id- jis turi buti pazymetas
            @if ($collumnName == 'id')
                <option value="id" selected>ID</option>
                {{--kitu atveju- jis nera pazymetas
                @else
                <option value="id">ID</option>
            @endif
            @if ($collumnName == 'title')
             <option value="title" selected>Title</option>
            @else
                <option value="title">Title</option>
            @endif
            @if ($collumnName == 'isbn')
                <option value="isbn" selected>ISBN</option>
            @else
                <option value="isbn">ISBN</option>
            @endif
            @if ($collumnName == 'pages')
                <option value="pages" selected>Pages</option>
            @else
                <option value="pages">Pages</option>
            @endif
            @if ($collumnName == 'author_id')
                <option value="author_id" selected>Author ID</option>
            @else
                <option value="author_id">Author ID</option>
            @endif
        </select>
        <select name="sortby">
            @if ($sortby == "asc")
                <option value="asc" selected>ASC</option>
                <option value="desc">DESC</option>
            @else
                <option value="asc">ASC</option>
                <option value="desc" selected>DESC</option>
            @endif
        </select>
        <button type="submit">SORT</button>
    </form>--}}

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
                {{--<td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</td>--}}


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



@endsection
