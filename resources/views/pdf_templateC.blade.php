<style>
    h1 {
        color: red;
        text-align: center;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>


<h1>ALL CATEGORIES LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Category Title</th>
        <th>Category Description</th>
    </tr>

    @foreach ($categories as $category)
        <tr>
            <td> {{$category->id }}</td>
            <td> {{$category->title}}</td>
            <td> {{$category->description}}</td>
        </tr>
    @endforeach
</table>
