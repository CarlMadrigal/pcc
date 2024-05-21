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
                <a href="/cooperative" id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a>
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
        
            <div class="coop-full-details">
                <div class="coop-head">
                    <div class="coop-prof">
                        <img src="{{ asset('images/default_coop_profile.png') }}" alt="" width="120px">
                        <div class="coop-name-owner">
                            <h1 id="coop-name">{{$cooperative->name}}</h1>
                            <p>{{$cooperative->head->name}}</p>
                            <small id="coop-id">#{{($cooperative->id)}}</small>
                        </div>
                    </div>
                    
                    <div class="coop-adds">
                        <button><a href="/cooperative/{{$cooperative->id}}/register/carabao"><span class="material-symbols-rounded">add</span><p>Carabao</p></a></button>
                        <button><a href=""><span class="material-symbols-rounded">edit</span><p>Edit</p></a></button>
                    </div>
                </div>
                <div class="coop-body">
                    <div class="coop-contacts">
                        <p><span class="material-symbols-rounded">location_on</span><span>{{$cooperative->address}}</span></p>
                        <p><span class="material-symbols-rounded">call</span><span>{{$cooperative->contact}}</span></p>
                        <p><span class="material-symbols-rounded">mail</span><span>{{$cooperative->head->email}}</span></p>
                    </div>
                    <h1>Summary</h1>
                    <div class="coop-summary">
                        <div class="total-carabaos">
                            <img src="{{ asset('images/cow.png') }}" alt="" width="">
                            <p>Total Registered<br><span class="highlight">CARABAOS</span></p>
                            <h2>{{count($cooperative->carabaos)}}</h2>
                        </div>

                        <div class="total-users">
                            <img src="{{ asset('images/user.png') }}" alt="" width="">
                            <p>Total Registered<br><span class="highlight">USERS</span></p>
                            <h2>{{count($cooperative->users->where('role', 'user'))}}</h2>
                        </div>

                        <div class="total-milk">
                            <img src="{{ asset('images/milk.png') }}" alt="" width="">
                            <p>Total Produced<br><span class="highlight">MILK</span></p>
                            <h2>{{$milks}} <small>liter</small></h2> 
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


</body>
</html>