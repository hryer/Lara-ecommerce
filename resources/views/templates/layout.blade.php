<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Laravel</title>
</head>
<body>

<header>
    <nav>
        <ul>
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="{{url('/drink')}}">Drink</a>
            </li>
            <li>
                <a href="{{url('/drink_type')}}">DrinkType</a>
            </li>
        </ul>
    </nav>
</header>

<main>
    @yield('app')
</main>

</body>
</html>