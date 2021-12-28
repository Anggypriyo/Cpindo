@extends('admin/komponen-admin/master')

@section('title','Pemesanan')

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
                                <h4 class="card-title">Tabel Pemesanan</h4>
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
                                                <th>Bukti Pemesanan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Kategori Pemesanan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Tanggal Pengambilan</th>
                                                <th>Keterangan Pemesanan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pemesanan as $k)
                                            <tr>
                                                <td>
                                                @if($k->bukti_pemesanan == null)
                                                <img src="{{asset($k->bukti_pemesanan)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->bukti_pemesanan }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>{{$k->tgl_pemesanan}}</td>
                                                <td>{{$k->katpem->nama_katpem}}</td>
                                                
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_pemesanan}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_pemesanan}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$k->id_pemesanan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pemesanan</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-4">
                                                        <img src="{{asset($k->bukti_pemesanan)}}" alt="image" class="img-thumbnail"
                                                            width="290">
                                                        <p class="mt-3 mb-0">
                                                    </div>
                                                    <form method="post" action="{{url('/admin/pemesanan/update/'.$k->id_pemesanan)}}" enctype="multipart/form-data">
                                                            @method('patch')
                                                            @csrf
                                                            <label for="bukti_pemesanan">Upload Gambar</label>
                                                                    <fieldset class="form-group">
                                                                            <input type="file" class="form-control-file" id="bukti_pemesanan" name="bukti_pemesanan" accept=".png, .jpg, .jpeg">
                                                                            <input type="text" class="form-control @error('bukti_pemesanan') is-invalid @enderror" id ="bukti_pemesanan" placeholder="Masukkan bukti pemesanan" name="bukti_pemesanan2" hidden value="{{ $k->bukti_pemesanan }}">
                                                                    </fieldset>
                                                                    @error('bukti_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                <div class="form-group">
                                                                    <label for="nama_pemesanan">Nama pemesanan</label>
                                                                    <input type="text" class="form-control @error('nama_pemesanan') is-invalid @enderror" id ="nama_pemesanan" placeholder="Masukkan Nama pemesanan" name="nama_pemesanan" value="{{ $k->nama_pemesanan }}">
                                                                    @error('nama_pemesanan') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_pemesanan">Harga pemesanan</label>
                                                                    <input type="number" class="form-control @error('harga_pemesanan') is-invalid @enderror" id ="harga_pemesanan" placeholder="Masukkan Harga pemesanan" name="harga_pemesanan" value="{{ $k->harga_pemesanan }}">
                                                                    @error('harga_pemesanan') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Nama Kategori pemesanan</label>
                                                                    <select class="form-control @error('id_katpem') is-invalid @enderror" name="id_katpem" id="exampleFormControlSelect1" >
                                                                    <option value="{{$k->katpem->id_katpem}}">{{$k->katpem->nama_katpem}}</option>
                                                                    
                                                                    </select>
                                                                    @error('id_katpem') <div class="invalid-feedback">{{$message}}</div>@enderror
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
                                                <div class="modal fade" id="deleteModal{{$k->id_pemesanan}}">
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
                                                        <form action="{{url('/admin/pemesanan/delete/'.$k->id_pemesanan)}}" method="post">
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
                                                <th>Bukti Pemesanan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Kategori Pemesanan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Tanggal Pengambilan</th>
                                                <th>Keterangan Pemesanan</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah pemesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/pemesanan/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="nama_pemesanan">Nama pemesanan </label>
                                  <input type="text" class="form-control @error('nama_pemesanan') is-invalid @enderror" id ="nama_pemesanan" placeholder="Masukkan Nama pemesanan" name="nama_pemesanan" value="{{ old('nama_pemesanan') }}">
                                  @error('nama_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="harga_pemesanan">Harga pemesanan </label>
                                  <input type="number" class="form-control @error('harga_pemesanan') is-invalid @enderror" id ="harga_pemesanan" placeholder="Masukkan Harga pemesanan" name="harga_pemesanan" value="{{ old('harga_pemesanan') }}">
                                  @error('harga_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <label for="bukti_pemesanan">Upload Gambar</label>
                                <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="bukti_pemesanan" name="bukti_pemesanan" accept=".png, .jpg, .jpeg">
                                </fieldset>
                                @error('bukti_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Judul Kategori</label>
                                  <select class="form-control @error('id_katpem') is-invalid @enderror" name="id_katpem" id="id_katpem" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($katpem as $k)
                                  <option value="{{$k->id_katpem}}">{{$loop->iteration}}. {{$k->nama_katpem}}</option>
                                  @endforeach
                                  </select>
                                  @error('id_katpem') <div class="invalid-feedback">{{$message}}</div>@enderror
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