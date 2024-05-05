<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/designStyle.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <title>notifications - PCC</title>
</head>
<body>
    <!-- Navigational Bar -->
    <div class="sidebar">
        <!-- Logo -->
        <a href="../index.html">
            <img src="{{ asset('images/combination logo.png') }}" class="logo">
        </a>

        <!-- User Profile -->
        <div class="user">
            <img class="profile-pic" src="{{ asset('images/profile.jpg') }}" alt="">
            <h2 id="name">{{auth()->user()->name}}</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/"><span class="material-symbols-rounded">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative"><span class="material-symbols-rounded">handshake</span><p>Cooperative</p></a>
            <a href="#"><span class="material-symbols-rounded">pie_chart</span><p>Analytics</p></a>
            <a href="/notification" class="active"><span class="material-symbols-rounded active-icon">notifications</span><p>Notifications</p></a>
            <a href="#"><span class="material-symbols-rounded">settings</span><p>Settings</p></a>
            <a href="/logout"><span class="material-symbols-rounded">logout</span><p>Log out</p></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">

        <!-- Head -->
        <div class="head">
            <h1>Notifications</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <a href="/deleteall" id="delete"><p>Delete All</p><span class="material-symbols-rounded">delete</span></a>
                <a href="" id="filter"><p>Filter</p><span class="material-symbols-rounded">page_info</span></a>
                <a href="" id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a>
            </div>
        </div>

    
        <!-- Content -->
        <div class="notification">
            @foreach ($notifs as $notif)
                <div class="notif">
                    <img src="{{ asset('images/default_coop_profile.png') }}" alt="" width="110px">
                    <div class="notif-details">
                        <h3 id="title">{{$notif->title}}</h3>
                        <p>{{$notif->message}}</p>
                        <p id="time">{{ $notif->created_at->format('Y-m-d') }}</p>
                    </div>
                    <a href="/delete/{{$notif->id}}"><button type="button" id="close"><span class="material-symbols-rounded">close</span></button></a>
                </div>
            @endforeach
        </div>

    </div>


</body>
</html>