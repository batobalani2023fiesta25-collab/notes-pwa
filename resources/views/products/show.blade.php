<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p><strong>ID:</strong> {{ $product['id'] }}</p>
    <p><strong>Name:</strong> {{ $product['name'] }}</p>
    <p><strong>Price:</strong> ${{ $product['price'] }}</p>

    <p>
        <a href="/products/{{ $product['id'] }}/edit">Edit</a> |
        <a href="/products">Back</a>
    </p>
</body>

</html>