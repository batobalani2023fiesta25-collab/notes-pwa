<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>

    <form action="/admin/categories" method="POST">
        @csrf
        <p>
            <label>Name:</label><br>
            <input type="text" name="name" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="3"></textarea>
        </p>
        <button type="submit">Create</button>
    </form>

    <a href="/admin/categories">Back</a>
</body>

</html>