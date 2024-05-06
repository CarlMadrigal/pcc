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
            <h1>Add Coop</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <a href="/cooperative" id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="add-coop-form">
                <form action="/register/cooperative/process" method="POST">
                    @csrf
                    <h1>Fill up the form</h1>
                    <div class="basic-info-coop">
                        <h3>Basic Info</h3>
                        <input type="text" placeholder="Coop Name" name="name" value="{{ old('name') }}" required>
                        <input type="text" placeholder="Coop Head" name="head" value="{{ old('head') }}" required>
                        <input type="text" placeholder="Address" name="address" value="{{ old('address') }}" required>
                        <input type="text" placeholder="Contact No." name="contact" value="{{ old('contact') }}" required> 
                    </div>

                    <div class="email-pass-coop">
                        <h3>Create Account</h3>
                        <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required> 
                        <input type="text" placeholder="Username" name="username" value="{{ old('username') }}" required> 
                        <input type="password" placeholder="Password" name="password" required>
                        <input type="password" placeholder="Confirm Password" name="confirmPassword" required>
                    </div>
                    <button>Confirm</button>
                </form>
                <img src="{{ asset('images/add-coop.png') }}" alt="" >
            </div>
        </div>
    </div>


</body>
</html>