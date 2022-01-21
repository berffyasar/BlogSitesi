@extends("admin.layout")
@section("content")
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Post Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('createPost')}}" files="true" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group" style="float: right; display:block">
                            <label>Kategori Adı</label>
                            <select name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"style="display: block">
                            <label>Post Adı</label>
                            <input type="text" class="form-control" name="post" required />
                        </div>

                        <div class="form-group">
                            <label>Post İçeriği</label>
                            <textarea type="text" class="form-control" name="post_content" required /> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Post Resmi</label>
                            <input type="file" id="myFile" name="file" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Post Adı</th>
                                <th>Görüntülenme</th>
                                <th>Kategori</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->show}}</td>
                                    <td>{{$post->getCategory->name}}</td>
                                    <td>
                                        <input class="switch"  type="checkbox" onchange="updateActive({{$post->id}})" @if($post->is_active==1) checked
                                               @endif data-toggle="toggle">
                                    </td>
                                    <td>
                                        <button onclick="getUpdate({{$post->id}})" class="btn btn-sm btn-primary edit-click" title="Postyi Düzenle"><i class="fa fa-edit text-white"></i></button>
                                        <button onclick="deleteCategory({{$post->id}})" class="btn btn-sm btn-danger remove-click" title="Postyi Sil"><i class="fa fa-times text-white"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Postyi Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <form action="{{route("updatePost")}}" id="updateCategoryModal" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Post Adı</label>
                            <input type="text" id="titleUpdate" class="form-control" name="post" required />
                        </div>
                        <div class="form-group">
                            <label>Post İçeriği</label>
                            <textarea type="text" id="contentUpdate" class="form-control" name="post_content" required /> </textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" id="idUpdate" />
                        </div>
                        <div class="form-group">
                            <label style="display: block">Resim</label>
                            <img id="image" src=""  height="250" width="250">
                            <input type="file" id="fileUpdate" name="fileUpdate" >
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                            <button onclick="postUpdate()"  class="btn btn-success">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Post Sil</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div id="body" class="modal-body">
                        <div class="alert alert-danger" id="articleAlert"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
        @section("script")
            <script>
                function deleteCategory(id) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        url: '{!! route('deletePost') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",

                    });
                    location.reload()
                }
            </script>

            <script>

                function getUpdate(id){
                    $.ajax({
                        type: 'GET',
                        url: '{{route('getPost')}}',
                        data: {id: id},
                        success: function (data) {

                            document.getElementById("titleUpdate").value = data.name;
                            document.getElementById("idUpdate").value = data.id;
                            document.getElementById("image").src = data.image;
                            document.getElementById("contentUpdate").innerHTML = data.content;

                            $('#updateId') .val(id);

                            $('#editModal').modal("toggle");

                        },
                    });
                }

            </script>
            <script>
                function postUpdate() {
                    var formData = new FormData(document.getElementById('updateCategoryModal'));
                    $.ajax({
                        type: 'POST',
                        url: '{{route('updatePost')}}',
                        data:formData,
                        dataType: "json",
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        contentType: false,
                        cache: false,
                        processData: false,

                    });
                }

            </script>
            <script>

                function updateActive(id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{route('activePost')}}',
                        data: {id: id},
                    })
                }

            </script>


@endsection
