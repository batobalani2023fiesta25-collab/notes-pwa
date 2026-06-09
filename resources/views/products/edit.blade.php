<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>

    <form action="/products/{{ $product['id'] }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ $product['name'] }}" required>
        </p>
        <p>
            <label>Price:</label><br>
            <input type="number" name="price" step="0.01" value="{{ $product['price'] }}" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="3">Product description</textarea>
        </p>
        <button type="submit">Update</button>
        <a href="/products">Cancel</a>
    </form>
</body>

</html>