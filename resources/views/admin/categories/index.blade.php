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
            <th>Action</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category['id'] }}</td>
            <td>{{ $category['name'] }}</td>
            <td><a href="/admin/categories/{{ $category['id'] }}">View</a></td>
        </tr>
        @endforeach
    </table>

    <p><a href="/admin/categories/create">Create Category</a></p>
    <a href="/">Back Home</a>
</body>

</html>