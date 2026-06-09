<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
    
    <ul>
        <li><a href="{{ route('basic.show', 1) }}">View Item 1</a></li>
        <li><a href="{{ route('basic.show', 2) }}">View Item 2</a></li>
    </ul>
    
    <a href="/">Back Home</a>
</body>
</html>
