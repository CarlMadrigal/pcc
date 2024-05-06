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
            <h1>Learning Materials</h1>
            <div class="head-control">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <span class="material-symbols-rounded">search</span>
                </div>
                <a id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a>
                <!-- <a><p>Add Coop</p><span class="material-symbols-rounded">add</span></a> -->
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="add-user-form">
                <form action="">
                    <!-- <h1>Upload Materials</h1> -->
                    <div class="basic-info-user">
                        <h3>File Info</h3>
                        <select id="breed" name="breed" required placeholder>
                            <option disabled selected>File type</option>
                            <option value="Philippine">File (PDF, dox, ppt)</option>
                            <option value="Murrah">Links (web-links, youtube links)</option>
                            <option value="Nelore">Video</option>
                            <option value="Jafarabadi">E-books</option>
                        </select>
                        <input type="file">
                        <input type="url" name="" id="" placeholder="Links">
                        <input type="text" placeholder="File Name" required>
                        <div class="coop-area">
                            <h3>Upload to:</h3>
                            <div class="select-coop">
                                <div class="options"><input type="radio" name="boac" id="boac"><label for="boac">Boac</label></div>
                                <div class="options"><input type="radio" name="gasan" id="gasan"><label for="gasan">Gasan</label></div>
                                <div class="options"><input type="radio" name="torrijos" id="torrijos"><label for="torrijos">Torrijos</label></div>
                                <div class="options"><input type="radio" name="mogpog" id="mogpog"><label for="mogpog">Mogpog</label></div>
                                <div class="options"><input type="radio" name="sta.cruz" id="sta.cruz"><label for="sta.cruz">Sta.cruz</label></div>
                                <div class="options"><input type="radio" name="buenavista" id="buenavista"><label for="buenavista">Buenavista</label></div>
                            </div>
                        </div>
                        
                        <textarea name="" id="" rows="3" cols="50" placeholder="Description"></textarea> 
                    </div>
                    <div class="clear-upload">
                        <button type="submit">Upload</button>
                        <button type="reset">Clear</button>
                    </div>
                </form>
                <img src="{{ asset('images/file.png') }}" alt="" width="150px" class="pic">
            </div>
            
            
        </div>
    </div>


</body>
</html>