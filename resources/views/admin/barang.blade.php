@extends('admin/komponen-admin/master')

@section('title','Barang')

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
                                <h4 class="card-title">Tabel Barang</h4>
                                <button class="btn btn-primary my-2" data-toggle="modal" data-target="#createModal">Create New Data</button>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kategori Barang</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($barang as $k)
                                            <tr>
                                                <td>{{$k->nama_barang}}</td>
                                                <td>{{$k->kategori_barang->nama_katbar}}</td>
                                                <td>
                                                @if($k->foto_gambar == null)
                                                <img src="{{asset($k->foto_barang)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->foto_barang }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_barang}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_barang}}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kategori Barang</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/barang/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="nama_barang">Nama Barang </label>
                                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id ="nama_barang" placeholder="Masukkan Nama Barang" name="nama_barang" value="{{ old('nama_barang') }}">
                                  @error('nama_barang') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                
                                <label for="foto_barang">Upload Gambar</label>
                                <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="foto_barang" name="foto_barang" accept=".png, .jpg, .jpeg">
                                </fieldset>
                                @error('foto_barang') <div class="invalid-feedback">{{$message}}</div>@enderror

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Judul Kategori</label>
                                  <select class="form-control @error('id_katbar') is-invalid @enderror" name="id_katbar" id="id_katbar" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($katbar as $k)
                                  <option value="{{$k->id_katbar}}">{{$loop->iteration}}. {{$k->nama_katbar}}</option>
                                  @endforeach
                                  </select>
                                  @error('id_katbar') <div class="invalid-feedback">{{$message}}</div>@enderror
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