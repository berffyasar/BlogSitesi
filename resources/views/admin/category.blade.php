@extends("admin.layout")
@section("content")
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('createCategory')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="category" required/>
                        </div>
                        <div class="form-group">
                            <label>Kategori Resmi</label>
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
                                <th>Kategori Adı</th>
                                <th>Paylaşım Sayısı</th>
                                <th>Durum</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->show}}</td>
                                    <td>
                                        <input onchange="updateActive({{$category->id}})" class="switch" type="checkbox"

                                               @if($category->is_active==1) checked
                                               @endif >
                                    </td>
                                    <td>
                                        <button onclick="getUpdate({{$category->id}})"
                                                class="btn btn-sm btn-primary edit-click" title="Kategoriyi Düzenle"><i
                                                class="fa fa-edit text-white"></i></button>
                                        <button onclick="deleteCategory({{$category->id}})"
                                                class="btn btn-sm btn-danger remove-click" title="Kategoriyi Sil"><i
                                                class="fa fa-times text-white"></i></button>
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
                    <h4 class="modal-title">Kategoriyi Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{route("updateCategory")}}" id="updateCategoryModal" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input id="name" type="text" class="form-control" name="name"/>
                            <input type="hidden" name="id" id="id"/>
                        </div>
                        <div class="form-group">
                            <label>Resim</label>
                            <img id="image" src="" height="250" width="250">
                            <input type="file" id="fileUpdate" name="fileUpdate">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                            <button onclick="postUpdate()" class="btn btn-success">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kategoriyi Sil</h4>
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
                        url: '{!! route('deleteCategory') !!}',
                        data: {
                            id: id
                        },
                        dataType: "json",

                    });
                    location.reload()
                }
            </script>

            <script>

                function getUpdate(id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{route('getCategory')}}',
                        data: {id: id},
                        success: function (data) {

                            document.getElementById("name").value = data.name;
                            document.getElementById("id").value = data.id;
                            document.getElementById("image").src = data.image;

                            $('#updateId').val(id);

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
                        url: '{{route('updateCategory')}}',
                        data: formData,
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
                        url: '{{route('activeCategory')}}',
                        data: {id: id},
                    })
                }

            </script>



@endsection
