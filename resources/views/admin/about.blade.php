@extends("admin.layout")
@section("content")

    <form action="{{route("aboutUpdate")}}" method="post">
     @csrf
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group" style="display:block">
                        <label>1.Başlık</label>
                        <input type="text" class="form-control" name="title1" value="{{$about->title_1}}" required />
                    </div>
                    <div class="form-group">
                        <label>1. İçerik</label>
                        <textarea type="text" class="form-control" name="content1"  required />{{$about->content_1}} </textarea>
                    </div>
                    <div class="form-group" style=" display:block">
                        <label>2.Başlık</label>
                        <input type="text" class="form-control" name="title2" value="{{$about->title_2}}"required />
                    </div>
                    <div class="form-group">
                        <label>2. İçerik</label>
                        <textarea type="text" class="form-control" name="content2" required /> {{$about->content_2}}</textarea>
                    </div>
                    <button class=" btn btn-primary btn-block" type="submit" >Kaydet</button>
                </div>
            </div>
        </div>



    </form>
@endsection
