<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p><strong>ID:</strong> {{ $id }}</p>
    <p><strong>Slug:</strong> {{ $slug }}</p>

    <ul>
        <li><a href="/optional">No Parameters</a></li>
        <li><a href="/optional/5">With ID</a></li>
        <li><a href="/optional/10/my-slug">With ID & Slug</a></li>
    </ul>

    <a href="/">Back Home</a>
</body>

</html>