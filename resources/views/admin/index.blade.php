@extends("admin.layout")
@section("content")




    <div class="centerflipcards clearfix">
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard invCard">
                    <div class="card-container"><i class="fas fa-blog"></i>
                        <h2 class="textshadow">Kategori Sayısı</h2>
                        <h3 class="textshadow"></h3>
                    </div>
                </div>
                <div class="backCard invCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="/newandusedcars.aspx?clearall=1">View Inventory</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard applyCard">
                    <div class="card-container"><i class="fas fa-user-md"></i>
                        <h2 class="textshadow">Gönderiler</h2>
                        <h3 class="textshadow">Bad Credit? No Credit? We have financing options for all credit needs.</h3>
                    </div>
                </div>
                <div class="backCard applyCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="[SSLDomain]/creditapp.aspx">Apply Today</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-flip">
                <div class="frontCard directionsCard">
                    <div class="card-container"><i class="fas fa-file-medical-alt"></i>
                        <h2 class="textshadow">Boş Yapma Ne Dinamiği</h2>
                        <h3 class="textshadow">We are conveniently located on Street Address in the City.</h3>
                    </div>
                </div>
                <div class="backCard directionsCard2">
                    <div class="card-container2"><a class="boxshadow flip-button" href="/directions.aspx">Get Directions</a></div>
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

