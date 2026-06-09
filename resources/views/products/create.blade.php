<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>

    <form action="/products" method="POST">
        @csrf
        <p>
            <label>Name:</label><br>
            <input type="text" name="name" required>
        </p>
        <p>
            <label>Price:</label><br>
            <input type="number" name="price" step="0.01" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="3"></textarea>
        </p>
        <button type="submit">Create</button>
    </form>

    <a href="/products">Back</a>
</body>

</html>