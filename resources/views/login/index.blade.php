<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Kebersihan ITG | Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/css/styles.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: url('/img/bg.jpg');
        background-size: cover;
        background-attachment: fixed;
    }
</style>

<body class="text-center"
    style=" height: 100%; display: flex;align-items: center;padding-top: 40px;padding-bottom: 40px;">
    <main class="form-signin shadow bg-white" style="border-radius: 10%">
        <form action="{{ route('index') }}" method="POST">
            @csrf
            <img class="mb-2" src="/img/itg.png" alt="" width="70px" height="70px">
            <h1 class="h3 mb-3 fw-normal"><b>Sistem Kebersihan ITG </b></h1>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email',) }}" autofocus required placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-primary w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="mt-5 mb-0 text-muted">&copy;2022</p>
        </form>
    </main>
    @include('sweetalert::alert')
</body>

</html>
