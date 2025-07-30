<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Admin Home Page</h1>

    <h3 style="color: royalblue">Name </h3>
    Hello ! {{ auth()->user()->name }}
    <hr>

    <h3 style="color: royalblue">email</h3>
    Hello ! {{ auth()->user()->email }}
    <hr>

    <h3 style="color: royalblue">role </h3>
    Hello ! {{ auth()->user()->role }}
    <hr>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <input type="submit" value="Logout">
    </form>


</body>

</html>
