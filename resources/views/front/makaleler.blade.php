<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset("front/makaleler.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Makaleler</title>
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

<div class="content">
    <div class="container">
        <h2>{{$post->title}}</h2>

        <img alt="Gambar" src="{{asset($post->image_url)}}" title="Gambar" />

        <p><b>{{$post->title}}</b>{{$post->content}}</p>
        <p></p>
    </div>

</div>


<!--FOOTER-->
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
    </script>
</body>
</html>
