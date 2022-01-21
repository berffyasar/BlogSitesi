<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset("front/anasayfa.css")}}">
    <title>Blog Sitesi</title>
</head>
<body>

<container>

    <zoomer>BLOG SİTESİ</zoomer>

    <secret>
        <div>
            <figure class="swing">
                <img src="mona.jfif" width="200" >
            </figure>
            <div class="name text-center">
                <h2 class="heading-small">Berfin Yaşar</h2>
                <h2 class="heading-small">Hasret Aşıroğlu</h2>
                <p>Fırat Üniversitesi | Yazılım Mühendisliği</p>
            </div>

        </div>
        <clickable><a href="{{route('makaleler')}}">Okumaya Başla</a></clickable>
    </secret>

    <leftie>
        <a href="https://github.com/berffyasar"> <icon class="bi bi-github"></icon></a>
        <a href="https://www.linkedin.com/in/berfin-y-709683199/"><icon class="bi bi-linkedin"></icon></a>
        <a href="https://www.instagram.com/hsrtasiroglu1/"><icon class="bi bi-instagram"></icon></a>
        <a href="https://discord.gg/WS4YPq6r"><icon class="bi bi-discord"></icon></a>
    </leftie>

    <rightie>
        <menu>
            <menu-item>
                <a href="{{route("about")}}">Hakkımızda</a>
            </menu-item>
            <menu-item>
                <a href="{{route('commination')}}">İletişim</a>
            </menu-item>
            <menu-item>
                <a href="{{route('category.index')}}">Kategoriler</a>
            </menu-item>
        </menu>
    </rightie>

</container>

</body>
</html>
