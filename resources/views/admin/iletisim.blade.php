@extends("admin.layout")
@section("content")
    <div class="row" style=" margin: auto;">
        <div class="col-md-8" >
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>
                <div class="card-body" s>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Adı</th>
                                <th>Soyadı</th>
                                <th>Telefon</th>
                                <th>Mail</th>
                                <th>Okundu</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($iletisims as $iletisim)
                                <tr>
                                    <td>{{$iletisim->name}}</td>
                                    <td>{{$iletisim->surname}}</td>
                                    <td>{{$iletisim->phone}}</td>
                                    <td>{{$iletisim->mail}}</td>
                                    <td>
                                        <input id="c{{$iletisim->id}}" class="switch" type="checkbox"

                                               @if($iletisim->okundu==1) checked
                                            @endif >
                                    </td>
                                    <td>
                                        <button onclick="getUpdate({{$iletisim->id}})"
                                                class="btn btn-sm btn-primary edit-click" title="Measjı Gör"><i
                                                class="fa fa-edit text-white"></i></button>
                                        <button onclick="deleteCategory({{$iletisim->id}})"
                                                class="btn btn-sm btn-danger remove-click" title="Mesajı Sil"><i
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
                    <h4 class="modal-title">Mesaj İçariği</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                        <div class="form-group">
                            <label style="display: block">Mesaj</label>
                            <textarea disabled="yes" id="iletisim">

                            </textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                        </div>

                </div>
            </div>
        </div>
        @endsection
        @section("script")
            <script>
                $("input:checkbox").click(function() { return false; });

                function deleteCategory(id) {
                    $.ajax({
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': "{{csrf_token()}} "},
                        url: '{!! route('iletisim.delete') !!}',
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
                    document.getElementById("c"+id).checked = true;


                    $.ajax({
                        type: 'GET',
                        url: '{{route('iletisim.content')}}',
                        data: {id: id},
                        success: function (data) {

                            document.getElementById("iletisim").innerHTML = data.content;

                            $('#updateId').val(id);

                            $('#editModal').modal("toggle");

                        },
                    });
                }

            </script>



@endsection
