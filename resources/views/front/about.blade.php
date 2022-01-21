<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda</title>
    <link rel="stylesheet" href="{{asset("front/hakkımızda.css")}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>

<header>
    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="index.html">B<span>L</span>OG</a></h1>
            <ul>
                <li><a href="{{route("index")}}">Anasayfa</a></li>
                <li><a href="{{route("about")}}">Hakkımızda</a></li>
                <li><a href={{route("commination")}}>İletişim</a></li>
                <li><a href="{{route('category.index')}}">Kategori</a></li>
            </ul>
        </nav>
    </div>
</header>

<div>
    <div class="about">

        <div class="upper">

            <div class="image">
                <div class="camp">
                    <img src="https://creazilla-store.fra1.digitaloceanspaces.com/cliparts/78235/tent-clipart-md.png" alt="Image" id="tent" />
                    <img src="https://thumbs.gfycat.com/LinedGoldenKentrosaurus-max-1mb.gif" alt="Image" id="fire" />
                </div>

            </div>
            <div class="info">
                <h1>{{$about->title_1}}</h1>
                <p>
                    {{$about->content_1}}
                </p>
            </div>
        </div>
        <!-- ------------------------------------ -->
        <div class="lower">
            <div class="info" id="lower-info">
                <h1>{{$about->title_2}}</h1>
                <p>
                    {{$about->content_2}}
                </p>
            </div>
            <div class="slider" id="lower-img">
                <img src="https://i.pinimg.com/736x/6d/7d/b3/6d7db3a1037c8ac5b41b0ebfec293ca4.jpg" alt="Image" id="slider" />
            </div>
        </div>
        <!-- ------------------------------------ -->
    </div>

    <script src="about.js"></script>

</div>

<footer>
    <div class="top_header">
        <section>
            <span><i class="fa fa-map-marker"></i></span>
            <span>Üniversite, Fırat Ünv., 23119 Elâzığ Merkez/Elazığ</span>
        </section>
        <section>
            <span><i class="fa fa-phone"></i></span>
            <span>(0424) 237 00 00</span>
        </section>
        <section>
            <span><i class="fa fa-envelope"></i></span>
            <span>info@berf.com</span>
        </section>
    </div>
    <span class="border-shape"></span>
    <div class="bottom_content">
        <section>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-telegram"></i></a>
        </section>
        <section>
            <a href="{{route("index")}}">Anasayfa</a>
            <a href="{{route("about")}}">Hakkımızda</a>
            <a href={{route("commination")}}>İletişim</a>
            <a href="{{route('category.index')}}">Kategori</a>
        </section>
    </div>
    <div class="copyright">
        Copyright © 2022 BERF
    </div>
</footer>

<script>
    var open = document.getElementById('hamburger');
    var changeIcon = true;

    open.addEventListener("click", function(){

        var overlay = document.querySelector('.overlay');
        var nav = document.querySelector('nav');
        var icon = document.querySelector('.menu-toggle i');

        overlay.classList.toggle("menu-open");
        nav.classList.toggle("menu-open");

        if (changeIcon) {
            icon.classList.remove("fa-bars");
            icon.classList.add("fa-times");

            changeIcon = false;
        }
        else {
            icon.classList.remove("fa-times");
            icon.classList.add("fa-bars");
            changeIcon = true;
        }
    });

    let images = [
        "https://i.pinimg.com/736x/6d/7d/b3/6d7db3a1037c8ac5b41b0ebfec293ca4.jpg",
        "https://i.pinimg.com/550x/52/10/e4/5210e4858e732f40ef13e5010d52b1f4.jpg",
        "https://i.pinimg.com/736x/44/08/9e/44089e56f4c65b00fffb914361f10cf4.jpg"
    ];
    let slide = document.getElementById("slider");
    const slider = () => {
        let i = 0;
        setInterval(function () {
            i = i < images.length - 1 ? ++i : 0;
            slide.src = images[i];
            console.log(i);
        }, 2000);
    };
    slide.addEventListener("load", slider());
</script>



</body>
</html>
