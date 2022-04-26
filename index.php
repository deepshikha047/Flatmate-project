


<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FlatMateNew</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Carousel-Hero.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Hero-Technology.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
      <?php include("menu.php");?>




    <div data-ride="carousel" class="carousel slide shadow" id="carousel-1" >
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="jumbotron hero-nature carousel-hero" style="height:704px;">
              <h1 class="hero-title">Flat Mate</h1>
              <p class="hero-subtitle">Perfect Place to search a mate any time any where</p>
              <p><a class="btn btn-primary btn-lg hero-button" role="button" href="search.html">Search Mate</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="jumbotron hero-photography carousel-hero" style="height:704px;">
                  <h1 class="hero-title">Flat Mate</h1>
              <p class="hero-subtitle">Perfect Place to search a mate any time any where</p>
              <p><a class="btn btn-primary btn-lg hero-button" role="button" href="search.html">Search Mate</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <div class="jumbotron hero-technology carousel-hero" style="height:704px;">
                  <h1 class="hero-title">Flat Mate</h1>
              <p class="hero-subtitle">Perfect Place to search a mate any time any where</p>
              <p><a class="btn btn-primary btn-lg hero-button" role="button" href="search.html">Search Mate</a></p>
            </div>
        </div>
    </div>
    <div><a href="#carousel-1" role="button" data-slide="prev" class="carousel-control-prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a href="#carousel-1" role="button" data-slide="next" class="carousel-control-next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
    <ol
        class="carousel-indicators">
        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-1" data-slide-to="1"></li>
        <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
</div>

    <div class="container" style="margin-top:100px;">
        <h1 class="text-center">Our top cities<br /></h1>
        <h3 class="text-center text-muted"><br />Choose the city you'll be living in next.<br /><br /></h3>
        <div class="row">
            <div class="col" style="cursor:pointer" onclick="location.assign('search.html?city=Delhi');">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <h4 class="card-title">Delhi</h4><img style="width: 200px;height: 144px;" src="assets/img/delhi.jpg" /></div>
                </div>
            </div>
            <div class="col"  style="cursor:pointer" onclick="location.assign('search.html?city=Banglore');">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <h4 class="card-title">Banglore</h4><img style="width: 200px;height: 144px;" src="assets/img/bangalore.jpg" /></div>
                </div>
            </div>
            <div class="col"  style="cursor:pointer" onclick="location.assign('search.html?city=Kanpur');">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <h4 class="card-title">Kanpur</h4><img style="width: 200px;height: 144px;" src="assets/img/kanpur.jpg" /></div>
                </div>
            </div>
            <div class="col"  style="cursor:pointer" onclick="location.assign('search.html?city=Mumbai');">
                <div class="card">
                    <div class="card-body shadow-sm">
                        <h4 class="card-title">Mumbai</h4><img style="width: 200px;height: 144px;" src="assets/img/mumbai.jpg" /></div>
                </div>
            </div>
        </div>
        
    </div>
    <hr />
    <div class="footer-basic">
    <footer>
        <!--<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>-->
      <!--  <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>-->
        <hr />
        <p class="copyright">Flat Mate Project &#169; 2021</p>
    </footer>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>