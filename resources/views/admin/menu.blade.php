@extends('admin/komponen-admin/master')

@section('title','Menu')

@section('css')
<link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabel Menu</h4>
                                <button class="btn btn-primary my-2" data-toggle="modal" data-target="#createModal">Create New Data</button>
                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Menu</th>
                                                <th>Harga Menu</th>
                                                <th>Kategori Menu</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($menu as $k)
                                            <tr>
                                                <td>{{$k->nama_menu}}</td>
                                                <td>Rp. {{$k->harga_menu}}</td>
                                                <td>{{$k->katmenu->nama_katmenu}}</td>
                                                <td>
                                                @if($k->foto_gambar == null)
                                                <img src="{{asset($k->foto_menu)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->foto_menu }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_menu}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_menu}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$k->id_menu}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-4">
                                                        <img src="{{asset($k->foto_menu)}}" alt="image" class="img-thumbnail"
                                                            width="290">
                                                        <p class="mt-3 mb-0">
                                                    </div>
                                                    <form method="post" action="{{url('/admin/menu/update/'.$k->id_menu)}}" enctype="multipart/form-data">
                                                            @method('patch')
                                                            @csrf
                                                            <label for="foto_menu">Upload Gambar</label>
                                                                    <fieldset class="form-group">
                                                                            <input type="file" class="form-control-file" id="foto_menu" name="foto_menu" accept=".png, .jpg, .jpeg">
                                                                            <input type="text" class="form-control @error('foto_menu') is-invalid @enderror" id ="foto_menu" placeholder="Masukkan Foto Menu" name="foto_menu2" hidden value="{{ $k->foto_menu }}">
                                                                    </fieldset>
                                                                    @error('foto_menu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                <div class="form-group">
                                                                    <label for="nama_menu">Nama menu</label>
                                                                    <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id ="nama_menu" placeholder="Masukkan Nama Menu" name="nama_menu" value="{{ $k->nama_menu }}">
                                                                    @error('nama_menu') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_menu">Harga menu</label>
                                                                    <input type="number" class="form-control @error('harga_menu') is-invalid @enderror" id ="harga_menu" placeholder="Masukkan Harga Menu" name="harga_menu" value="{{ $k->harga_menu }}">
                                                                    @error('harga_menu') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Nama Kategori Menu</label>
                                                                    <select class="form-control @error('id_katmenu') is-invalid @enderror" name="id_katmenu" id="exampleFormControlSelect1" >
                                                                    <option value="{{$k->katmenu->id_katmenu}}">{{$k->katmenu->nama_katmenu}}</option>
                                                                    @foreach($katmenu as $k)
                                                                    <option value="{{$k->id_katmenu}}">{{$loop->iteration}}. {{$k->nama_katmenu}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('id_katmenu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                </div>
                                                                    <button type="sumbit" class="btn btn-primary">Edit Data</button>
                                                                    
                                                            </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss ="modal">Close</button>
                                                    
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- end Modal -->
                                                
                                                <!-- The Modal Delete -->
                                                <div class="modal fade" id="deleteModal{{$k->id_menu}}">
                                                    <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Peringatan</h4>
                                                        <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                        Yakin ingin Menghapus
                                                        </div>
                                                        
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                        <form action="{{url('/admin/menu/delete/'.$k->id_menu)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-dismiss ="modal">Close</button>
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Menu</th>
                                                <th>Harga Menu</th>
                                                <th>Kategori Menu</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
    <!-- Modal tambah data -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/menu/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="nama_menu">Nama menu </label>
                                  <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id ="nama_menu" placeholder="Masukkan Nama menu" name="nama_menu" value="{{ old('nama_menu') }}">
                                  @error('nama_menu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="harga_menu">Harga menu </label>
                                  <input type="number" class="form-control @error('harga_menu') is-invalid @enderror" id ="harga_menu" placeholder="Masukkan Harga menu" name="harga_menu" value="{{ old('harga_menu') }}">
                                  @error('harga_menu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <label for="foto_menu">Upload Gambar</label>
                                <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="foto_menu" name="foto_menu" accept=".png, .jpg, .jpeg">
                                </fieldset>
                                @error('foto_menu') <div class="invalid-feedback">{{$message}}</div>@enderror

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Judul Kategori</label>
                                  <select class="form-control @error('id_katmenu') is-invalid @enderror" name="id_katmenu" id="id_katmenu" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($katmenu as $k)
                                  <option value="{{$k->id_katmenu}}">{{$loop->iteration}}. {{$k->nama_katmenu}}</option>
                                  @endforeach
                                  </select>
                                  @error('id_katmenu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                              </form>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              
                              </div>
                            </div>
                          </div>
                        </div>
            <!-- end Modal -->
    @endsection

@section('script')
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable( {
        fixedHeader: true
    } );
} );
</script>

@endsection