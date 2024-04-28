<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/designStyle.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <title>Cooperative - PCC</title>
</head>
<body>
    <!-- Navigational Bar -->
    <div class="sidebar">
        <!-- Logo -->
        <a href="/">
            <img src="../images/combination logo.png" class="logo">
        </a>

        <!-- User Profile -->
        <div class="user">
            <img class="profile-pic" src="../images/profile.jpg" alt="">
            <h2 id="name">Dave Geroleo</h2>
        </div>

        <!-- Controls -->
        <div class="controls">
            <a href="/"><span class="material-symbols-rounded">grid_view</span><p>Dashboard</p></a>
            <a href="/cooperative" class="active"><span class="material-symbols-rounded active-icon">handshake</span><p>Cooperative</p></a>
            <a href="#"><span class="material-symbols-rounded">pie_chart</span><p>Analytics</p><p id="count">5</p></a>
            <a href="#"><span class="material-symbols-rounded">notifications</span><p>Notifications</p><p id="count">50</p></a>
            <a href="#"><span class="material-symbols-rounded">chat</span><p>Messages</p><p id="count">10</p></a>
            <a href="#"><span class="material-symbols-rounded">settings</span><p>Settings</p></a>
            <a href="#"><span class="material-symbols-rounded">logout</span><p>Log out</p></a>
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
                <a href="/add-coop"><p>Add Coop</p><span class="material-symbols-rounded">add</span></a>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/boac.png">
                <div class="coop-details">
                    <h2>Boac Coop.</h2>
                    <h3>Cooperative 1</h3>
                </div>
            </a>

            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/Gasan.png">
                <div class="coop-details">
                    <h2>Gasan Coop.</h2>
                    <h3>Cooperative 1</h3>
                </div>
            </a>

            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/torrijos.png">
                <div class="coop-details">
                    <h2>Torijjos Coop.</h2>
                    <h3>Cooperative 3</h3>
                </div>
            </a>

            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/mogpog.png">
                <div class="coop-details">
                    <h2>Mogpog Coop.</h2>
                    <h3>Cooperative 4</h3>
                </div>
            </a>

            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/buenavista.png">
                <div class="coop-details">
                    <h2>Buenavista Coop.</h2>
                    <h3>Cooperative 5</h3>
                </div>
            </a>

            <a href="#" class="coop-con">
                <div class="color">
                    <span class="material-symbols-rounded">more_vert</span>
                </div>
                <img class="coop-profile" src="../images/Coop profile/sta.cruz.png">
                <div class="coop-details">
                    <h2>Sta. Cruz Coop.</h2>
                    <h3>Cooperative 6</h3>
                </div>
            </a>

        </div>
    </div>


</body>
</html>