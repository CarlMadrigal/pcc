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
            <h2 id="name">{{auth()->user()->name}}</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/" class="active"><span class="material-symbols-rounded active-icon">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative"><span class="material-symbols-rounded ">handshake</span><p>Cooperative</p></a>
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
            <h1>Dashboard</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <input id="date" type="date">
                <a><p>Edit</p><span class="material-symbols-rounded">edit</span></a>
                <!-- <a id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a> -->
            </div>
        </div>

        <!-- Content -->
        <div class="analytics">
            <div class="coop-summary">
                <div class="total-carabaos">
                    <img src="{{ asset('images/cow.png') }}" alt="" >
                    <div>
                        <p>Overall Registered<br><span class="highlight">CARABAOS</span></p>
                        <h2>{{count($carabaos)}}</h2>
                    </div>
                </div>
    
                <div class="total-users">
                    <img src="{{ asset('images/user.png') }}" alt="" >
                    <div>
                        <p>Overall Registered<br><span class="highlight">USERS</span></p>
                        <h2>{{count($users)}}</h2>
                    </div>
                </div>
    
                <div class="total-milk">
                    <img src="{{ asset('images/default_coop_profile.png') }}" alt="">
                    <div>
                        <p>Overall Registered<br><span class="highlight">COOPERATIVES</span></p>
                        <h2>{{count($coops)}}</h2> 
                    </div>

                </div>
            </div>
            

            <div class="insights">
                <div class="healthy">
                    <div class="middle">
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>70%</p>
                            </div>
                        </div>
                        <div class="right">
                            <h3>Overall<br>Healthy</h3>
                            <h2><span id="count-carabao">5360</span> Carabaos</h2>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>

                <div class="unhealthy">
                    <div class="middle">
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>10%</p>
                            </div>
                        </div>
                        <div class="right">
                            <h3>Overall<br>Unhealthy</h3>
                            <h2><span id="count-carabao">600</span> Carabaos</h2>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>

                <div class="under-observation">
                    <div class="middle">
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>20%</p>
                            </div>
                        </div>
                        <div class="right">
                            <h3>Overall<br>Under Observation</h3>
                            <h2><span id="count-carabao">1200</span> Carabaos</h2>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
            </div>

            <div class="registeredCoop">
                <div class="co-op">
                    <h2>Registered Coops</h2>
                    <div class="box">
                        @foreach ($coops as $coop)
                            <div class="coops"><img src="{{ asset('images/Coop profile/boac.png') }}" width="50px"><h3 value="Philippine">{{$coop->name}}</h3><p>0%</p></div>
                        @endforeach
                    </div>
                </div>
                <div class="car-gender">
                    <h2>Carabao's Gender</h2>
                    <div class="box">
                        <div class="female"><img src="{{ asset('images/female-cow.png') }}" width="100px"><h3>Female</h3><p>78%</p></div>
                        <div class="male"><img src="{{ asset('images/male-cow.png') }}" width="100px"><h3>Male</h3><p>22%</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside>
        <div class="recent-updates">
            <h2>Recent Updates</h2>
            <div class="recUp-con">
                @foreach ($notifs as $notif)
                    <div class="recUp">
                        <img src="{{ asset('images/Coop profile/buenavista.png') }}" alt="" width="110px">
                        <div class="recUp-details">
                            <p><span id="up-name">{{$notif->title}}</span> {{$notif->message}}</p>
                            <small id="time">{{ $notif->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="top-milk">
            <h2>Top Coop Performance</h2>
            <div class="recUp-con">
                <div class="recUp top-performer">
                    <h1 id="rank">1</h1>
                    <img src="{{ asset('images/Coop profile/boac.png') }}" alt="" width="110px">
                    <div class="recUp-details  coopDetails">
                        <div class="name-id">
                            <p id="coop-name">Boac Coop.</p>
                            <p id="coop-id">#22B0933</p>
                        </div>
                        <div class="performance">
                            <span class="material-symbols-rounded">trending_up</span>
                            <h4 id="coop-rate">89.90%</h4>
                        </div>
                    </div>
                </div>

                <div class="recUp top-performer">
                    <h1 id="rank">2</h1>
                    <img src="{{ asset('images/Coop profile/gasan.png') }}" alt="" width="110px">
                    <div class="recUp-details  coopDetails">
                        <div class="name-id">
                            <p id="coop-name">Gasan Coop.</p>
                            <p id="coop-id">#22B0933</p>
                        </div>
                        <div class="performance">
                            <span class="material-symbols-rounded">trending_up</span>
                            <h4 id="coop-rate">85.56%</h4>
                        </div>
                    </div>
                </div>

                <div class="recUp top-performer">
                    <h1 id="rank">3</h1>
                    <img src="{{ asset('images/Coop profile/mogpog.png') }}" alt="" width="110px">
                    <div class="recUp-details  coopDetails">
                        <div class="name-id">
                            <p id="coop-name">Mogpog Coop.</p>
                            <p id="coop-id">#22B0933</p>
                        </div>
                        <div class="performance">
                            <span class="material-symbols-rounded">trending_up</span>
                            <h4 id="coop-rate">83.82%</h4>
                        </div>
                    </div>
                </div>

                <div class="recUp top-performer">
                    <h1 id="rank">4</h1>
                    <img src="{{ asset('images/Coop profile/sta.cruz.png') }}" alt="" width="110px">
                    <div class="recUp-details  coopDetails">
                        <div class="name-id">
                            <p id="coop-name">Sta. Cruz Coop.</p>
                            <p id="coop-id">#22B0933</p>
                        </div>
                        <div class="performance">
                            <span class="material-symbols-rounded">trending_up</span>
                            <h4 id="coop-rate">81.39%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>


</body>
</html>