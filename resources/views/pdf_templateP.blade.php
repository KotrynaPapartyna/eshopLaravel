<style>
    h1 {
        color: green;
        text-align: center;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>


<h1>ALL PRODUCTS LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Product Title</th>
        <th>Product Excertpt </th>
        <th>Product Description</th>
        <th>Product Price </th>
        <th>Product Image</th>


    </tr>

    @foreach ($products as $product)
        <tr>
            <td> {{$product->id }}</td>
            <td> {{$product->title}}</td>
            <td> {{$product->Excertpt}}</td>
            <td> {{$product->description}}</td>
            <td> {{$product->image}}</td>

        </tr>
    @endforeach
</table>
