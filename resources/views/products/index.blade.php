<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>${{ $product['price'] }}</td>
            <td><a href="/products/{{ $product['id'] }}">View</a></td>
        </tr>
        @endforeach
    </table>

    <p><a href="/products/create">Create Product</a></p>
    <a href="/">Back Home</a>
</body>

</html>