<!DOCTYPE html>
<html>
<head>
    <title>Event Survey</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-light">

    <div class="container py-5">
        @yield('content')
        @auth
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button class="btn btn-sm btn-outline-danger">
                    Logout
                </button>
            </form>
        @endauth
    </div>

</body>
</html>
