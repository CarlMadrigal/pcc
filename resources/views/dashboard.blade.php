<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/designStyle.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://lucide.dev/icons/">    
    <title>Dashboard - PCC</title>
</head>
<body>
    <!-- Navigational Bar -->
    <div class="sidebar">
        <!-- Logo -->
        <a href="/">
            <img src="{{ asset('images/combination logo.png') }}" class="logo">
        </a>

        <!-- User Profile -->
        <div class="user">
            <img class="profile-pic" src="{{ asset('images/profile.jpg') }}" alt="">
            <h2 id="name">Dave Geroleo</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/" class="active"><span class="material-symbols-rounded active-icon">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative"><span class="material-symbols-rounded ">handshake</span><p>Cooperative</p></a>
            <a href="#"><span class="material-symbols-rounded">pie_chart</span><p>Analytics</p><p id="count">5</p></a>
            <a href="/notification"><span class="material-symbols-rounded">notifications</span><p>Notifications</p><p id="count">50</p></a>
            <a href="#"><span class="material-symbols-rounded">chat</span><p>Messages</p><p id="count">10</p></a>
            <a href="#"><span class="material-symbols-rounded">settings</span><p>Settings</p></a>
            <a href="/logout"><span class="material-symbols-rounded">logout</span><p>Log out</p></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">

        <!-- Head -->
        <div class="head">
            <h1>Dashboard</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <a><p>Edit</p><span class="material-symbols-rounded">edit</span></a>
            </div>
        </div>

        <!-- Content -->
        
    </div>


</body>
</html>