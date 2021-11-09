<style>
    h1 {
        color: red;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>


<h1>ALL SHOPS LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Shop Title</th>
        <th>Shop Description</th>
        <th>Shop Email</th>
        <th>Shop Phone</th>
        <th>Shop Country</th>

    </tr>

    @foreach ($shops as $shop)
        <tr>
            <td> {{$shop->id }}</td>
            <td> {{$shop->title}}</td>
            <td> {{$shop->description}}</td>
            <td> {{$shop->email}}</td>
            <td> {{$shop->phone}}</td>
            <td> {{$shop->country}}</td>
        </tr>
    @endforeach
</table>
