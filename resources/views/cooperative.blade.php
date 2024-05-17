<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/designStyle.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <title>Cooperative - PCC</title>
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
            <h2 id="name">{{auth()->user()->name}}</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/"><span class="material-symbols-rounded">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative" class="active"><span class="material-symbols-rounded active-icon">handshake</span><p>Cooperative</p></a>
            <a href="/analytics"><span class="material-symbols-rounded">pie_chart</span><p>Analytics</p></a>
            <a href="/notification"><span class="material-symbols-rounded">notifications</span><p>Notifications</p></a>
            <a href="#"><span class="material-symbols-rounded">settings</span><p>Settings</p></a>
            <a href="/logout"><span class="material-symbols-rounded">logout</span><p>Log out</p></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">

        <!-- Head -->
        <div class="head">
            <h1>Cooperative</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <a href="/upload/cooperative"><span class="material-symbols-rounded">upload</span><p>Add Materials</p></a>
                <a href="/register/cooperative"><p>Add Coop</p><span class="material-symbols-rounded">add</span></a>
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
            @foreach ($cooperatives as $cooperative)
                <a href="/cooperative/{{$cooperative->id}}" class="coop-con">
                    <div class="color">
                        <span class="material-symbols-rounded">more_vert</span>
                    </div>
                    <img class="coop-profile" src="{{ asset('images/default_coop_profile.png') }}">
                    <div class="coop-details">
                        <h2>{{$cooperative->name}}</h2>
                        <h3>{{$cooperative->address}}</h3>
                    </div>
                </a>   
            @endforeach
        </div>
    </div>


</body>
</html>