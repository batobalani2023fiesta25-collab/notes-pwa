<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p><strong>ID:</strong> {{ $category['id'] }}</p>
    <p><strong>Name:</strong> {{ $category['name'] }}</p>

    <p>
        <a href="/admin/categories/{{ $category['id'] }}/edit">Edit</a> |
        <a href="/admin/categories">Back</a>
    </p>
</body>

</html>