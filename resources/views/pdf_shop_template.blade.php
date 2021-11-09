<style>
    h1 {
        color: blue;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>

{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
     <h1>SHOPS</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Shop Title</th>
        <th>Shop Description</th>
        <th>Shop Email</th>
        <th>Shop Phone</th>
        <th>Shop Country</th>

    </tr>

    <tr>
            <td> {{$shop->id }}</td>
            <td> {{$shop->title}}</td>
            <td> {{$shop->description}}</td>
            <td> {{$shop->email}}</td>
            <td> {{$shop->phone}}</td>
            <td> {{$shop->country}}</td>
    </tr>

</table>
