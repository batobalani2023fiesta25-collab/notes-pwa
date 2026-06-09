<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>

    <form action="/admin/categories/{{ $category['id'] }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Name:</label><br>
            <input type="text" name="name" value="{{ $category['name'] }}" required>
        </p>
        <p>
            <label>Description:</label><br>
            <textarea name="description" rows="3">Category description</textarea>
        </p>
        <button type="submit">Update</button>
        <a href="/admin/categories">Cancel</a>
    </form>
</body>

</html>