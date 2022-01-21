<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>İletişim</title>
    <link rel="stylesheet" href="{{asset("front/iletisim.css")}}">
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


<div class="container">
    <div class="innerwrap">

        <section class="section1 clearfix">
            <div class="textcenter">
                <span class="shtext">İletişim</span>
                <span class="seperator"></span>
                <h1>Bize Mail atın</h1>
            </div>
        </section>

        <section class="section2 clearfix">
            <div class="col2 column1 first">
                <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div class="sec2map" style='overflow:hidden;height:550px;width:100%;'><div id='gmap_canvas' style='height:100%;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">					</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(19.075314480255834,72.88153973865361),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(38.67413, 39.18846)});infowindow = new google.maps.InfoWindow({content:'<strong>Benim Bulunduğum Yer</strong><br>Turkiye<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <div class="col2 column2 last">
                <div class="sec2innercont">
                    <div class="sec2addr">
                        <p>Üniversite, Fırat Ünv., 23119 Elâzığ Merkez/Elazığ </p>
                        <p><span class="collig">Telefon :</span> (0424) 237 00 00</p>
                        <p><span class="collig">Mail :</span> firat.edu.tr</p>
                        <p><span class="collig">Fax :</span> (0424) 237 00 00</p>
                    </div>
                </div>
                <div class="sec2contactform">
                    <h3 class="sec2frmtitle">Daha Fazla Bilgi İster misiniz? Bize Mail Atın</h3>
                    <form action="{{route('comminationPost')}}" method="post">
                        @csrf
                        <div class="clearfix">
                            <input class="col2 first" name="name" type="text" placeholder="İsim" required>
                            <input class="col2 last" name="surname" type="text" placeholder="Soyisim" required>
                        </div>
                        <div class="clearfix">
                            <input  class="col2 first" name="email" type="Email" placeholder="Mail" required>
                            <input class="col2 last" name="phone" type="text" placeholder="İletişim Numarası" required>
                        </div>
                        <div class="clearfix">
                            <textarea name="message" id="" required cols="30" rows="7">Bir mesaj giriniz...</textarea>
                        </div>
                        <div class="clearfix"><input type="submit" value="Gönder"></div>
                    </form>
                </div>

            </div>
        </section>
        @if(session()->has('message'))
            <div class="alert alert-success" style="font-size: large;color:darkred;float: right">
                {{ session()->get('message') }}
            </div>
        @endif

    </div>
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
</script>


</body>
</html>
