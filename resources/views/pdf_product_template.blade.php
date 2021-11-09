<style>
    h1 {
        color: blue;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>

{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
     <h1>PRODUCTS</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Product Title</th>
        <th>Product Excertpt </th>
        <th>Product Description</th>
        <th>Product Price </th>
        <th>Product Image</th>

    </tr>

    <tr>
        <td> {{$product->id }}</td>
        <td> {{$product->title}}</td>
        <td> {{$product->excertpt}}</td>
        <td> {{$product->description}}</td>
        <td> {{$product->price}}</td>
        <td> {{$product->image}}</td>
    </tr>

</table>
