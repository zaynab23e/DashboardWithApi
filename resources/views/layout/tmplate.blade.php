<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #fff;
            color: #000;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #000;
            padding: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input, select, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #000;
            background-color: #fff;
            color: #000;
        }
        button {
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

    <title>@yield('title', 'unknow')</title>

    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
    
        <nav>
            <ul>
                <li><a href="{{ route('admin.index') }}">index</a></li>
                <li><a href="{{ route('admin.create') }}">create</a></li>
            
            </ul>
        </nav>
    </header>

    <main>
        
        @yield('content')
    </main>



    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
