<?php
if(session_status()==1)session_start();
?>
   <nav class="navbar navbar-dark navbar-expand-md bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="font-size: 20px;"><strong>Flat Mate</strong></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse d-xl-flex justify-content-xl-end collapse"
                id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" role="button" href="search.html">Search</a></li>
                      <?php if(!isset($_SESSION['UID'])) {?>
                    <li class="nav-item"><a class="nav-link" role="button" href="login.html">Login</a></li>
                    <?php } else { ?>
                    <li class="nav-item"><a class="nav-link active" href="myProfile.html">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ads.html">My Ads</a></li>

                    <li class="nav-item"><a class="nav-link active" href="assets/phpscript/Logout.php">Logout</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" role="button" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        body{
            background-image: url("https://eskipaper.com/images/city-background-3.jpg");
            background-size: 100%;
        }
    </style>