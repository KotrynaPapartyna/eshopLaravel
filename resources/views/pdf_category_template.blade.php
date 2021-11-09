<style>
    h1 {
        color: blue;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>

{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
     <h1>CATEGORIES</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Category Title</th>
        <th>Category Description</th>


    </tr>

    <tr>
            <td> {{$category->id }}</td>
            <td> {{$category->title}}</td>
            <td> {{$category->description}}</td>
    </tr>

</table>
