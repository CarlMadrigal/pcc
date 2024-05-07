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
                <a href="/cooperative/{{request()->route('id')}}" id="backBtn"><span class="material-symbols-rounded">arrow_back</span></a>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="add-user-form">
                <form action="/upload/process" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" style="display:none" name="cooperative" value="{{request()->route('id')}}">
                    <div class="basic-info-user">
                        <h3>File Info</h3>
                        <input type="file" name="file" id="file">
                        <h4 style="text-align: center;">or</h4>
                        <input type="url" name="link" id="link" placeholder="Links">
                        <input type="text" placeholder="File Name" name="name" id="name" value="{{old('name')}}" required>           
                        <textarea name="description" id="description" rows="3" cols="50" placeholder="Description">{{ old('description') }}</textarea> 
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

    <script>
        function handleFileInput(){
            document.getElementById("link").readOnly=true;
        }
        document.getElementById("file").addEventListener("change", handleFileInput, true);

        function handleLinkInput(){
            if(document.getElementById("link").value != ''){
                document.getElementById("file").disabled=true;
            }else{
                document.getElementById("file").disabled=false;
            }
        }
        document.getElementById("link").addEventListener("keyup", handleLinkInput);
    </script>
</body>
</html>

