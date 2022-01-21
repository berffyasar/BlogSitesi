@extends("admin.layout")
@section("content")




    <div class="centerflipcards clearfix">
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard invCard">
                    <div class="card-container"><i class="fas fa-paste"></i>
                        <h2 class="textshadow">Kategori Sayısı</h2>
                        <h1 class="textshadow">{{Count(\App\Models\Category::all())}}</h1>
                    </div>
                </div>
                <div class="backCard invCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="{{Route("category")}}"> Kategoriye Git</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard applyCard">
                    <div class="card-container"><i class="fas fa-blog"></i>
                        <h2 class="textshadow">Gönderiler</h2>
                        <h1 class="textshadow">{{Count(\App\Models\Post::all())}}</h1>
                    </div>
                </div>
                <div class="backCard applyCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="{{Route("post")}}">Posta Git</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard directionsCard">
                    <div class="card-container"><i class="fab fa-facebook-messenger"></i>
                        <h2 class="textshadow">Mesaj Sayısı</h2>
                        <h1 class="textshadow">{{Count(\App\Models\Iletisim::all())}}</h1>
                    </div>
                </div>
                <div class="backCard directionsCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="{{Route("iletisim.index")}}">İletişime Git</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="b">
        <div class="bar">
            <div class="ball"></div>
        </div>
    </div>




@endsection
@section("script")
@endsection

