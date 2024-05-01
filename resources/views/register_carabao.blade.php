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
            <h2 id="name">Dave Geroleo</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/"><span class="material-symbols-rounded">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative" class="active"><span class="material-symbols-rounded active-icon">handshake</span><p>Cooperative</p></a>
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
            <h1>Add Carabao</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <!-- <a><p>Add Coop</p><span class="material-symbols-rounded">add</span></a> -->
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="add-user-form">
                <form action="/register/carabao/process" method="POST">
                    @csrf
                    <input type="text" style="display:none" name="cooperative" value="{{request()->route('id')}}">
                    <h1>Fill up the form</h1>
                    <div class="basic-info-carabao">
                        <h3>Carabao's Info</h3>

                        <input type="text" placeholder="Carabao's name" name="name" required>
                    <div class="breed-weight">
                        <select id="breed" name="breed" required placeholder>
                            <option disabled selected>Select breed</option>
                            <option value="Water Buffalo">Water Buffalo</option>
                            <option value="Murrah">Murrah</option>
                            <option value="Nili Ravi">Nili Ravi</option>
                            <option value="Phippine Carabao">Phippine Carabao</option>
                        </select>

                        <input type="text" placeholder="Weight" name="weight" required>
                    </div>
                        
                        <select id="owner" name="owner" required>
                            <option disabled selected>Select owner</option>

                            @foreach ($users as $users)
                                <option value="{{$users->id}}">{{$users->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- <div class="email-pass-user">
                        <h3>Create Account</h3>
                        <input type="text" placeholder="Username" required>
                        <input type="password" placeholder="Password" required>
                        <input type="password" placeholder="Confirm Password" required>
                    </div> -->
                    <button type="submit">Submit</button>
                </form>
                <img src="{{ asset('images/carabao.png') }}" alt="" >
            </div>

            
        </div>
    </div>


</body>
</html>