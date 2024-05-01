<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCC login</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="/login" method="POST">
            @csrf
            <div class="mainLogo">
                <img src="{{ asset('images/logo.png') }}" class="logo" width="300px">
                <h1>Log in</h1>
            </div>
            
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required>
                <i class='bx bx-user' ></i>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Password" name="password" required>
                <i class='bx bx-lock' ></i>
                <box-icon name='lock' ></box-icon>
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn">
                Log in
            </button>
        </form>
    </div>
    <img src="{{ asset('images/admin.png') }}" class="admin-pic">
    
</body>
</html>