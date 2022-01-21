@extends('admin/komponen-admin/master')

@section('title','Detail Barang')

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
                                <h4 class="card-title">Tabel Detail Barang</h4>
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
                                                <th>Nama Barang</th>
                                                <th>Stok Barang</th>
                                                <th>Bukti Pengadaan</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th>Riwayat Pembaharuan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detbg as $k)
                                            <tr>
                                                <td>{{$k->barang->nama_barang}}</td>
                                                <td>{{$k->stok_barang}}</td>
                                                <td>
                                                @if($k->pengadaan->bukti_pengadaan == null)
                                                <img src="{{asset($k->pengadaan->bukti_pengadaan)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->pengadaan->bukti_pengadaan }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>{{$k->pengadaan->tgl_pengadaan}}</td>
                                                <td>{{$k->updated_at}}</td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_detbg}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_detbg}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$k->id_detbg}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-4">
                                                        <img src="{{asset($k->bukti_pengadaan)}}" alt="image" class="img-thumbnail"
                                                            width="290">
                                                        <p class="mt-3 mb-0">
                                                    </div>
                                                    <form method="post" action="{{url('/admin/barang/update/'.$k->id_detbg)}}" enctype="multipart/form-data">
                                                            @method('patch')
                                                            @csrf
                                                            <label for="bukti_pengadaan">Upload Gambar</label>
                                                                    <fieldset class="form-group">
                                                                            <input type="file" class="form-control-file" id="bukti_pengadaan" name="bukti_pengadaan" accept=".png, .jpg, .jpeg">
                                                                            <input type="text" class="form-control @error('bukti_pengadaan') is-invalid @enderror" id ="bukti_pengadaan" placeholder="Masukkan Foto Pegawai" name="bukti_pengadaan2" hidden value="{{ $k->bukti_pengadaan }}">
                                                                    </fieldset>
                                                                    @error('bukti_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                <div class="form-group">
                                                                    <label for="nama_barang">Bukti Pengadaan</label>
                                                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id ="nama_barang" placeholder="Masukkan Bukti Pengadaan" name="nama_barang" value="{{ $k->nama_barang }}">
                                                                    @error('nama_barang') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Tanggal Pengadaan</label>
                                                                    <select class="form-control @error('id_pengadaan') is-invalid @enderror" name="id_pengadaan" id="exampleFormControlSelect1" >
                                                                    <option value="{{$k->pengadaan->id_pengadaan}}">{{$k->pengadaan->tgl_pengadaan}}</option>
                                                                    @foreach($katbar as $k)
                                                                    <option value="{{$k->id_pengadaan}}">{{$loop->iteration}}. {{$k->tgl_pengadaan}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('id_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
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
                                                <div class="modal fade" id="deleteModal{{$k->id_detbg}}">
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
                                                        <form action="{{url('/admin/barang/delete/'.$k->id_detbg)}}" method="post">
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
                                                <th>Bukti Pengadaan</th>
                                                <th>Pengadaan</th>
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
                                  <label for="nama_barang">Bukti Pengadaan </label>
                                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id ="nama_barang" placeholder="Masukkan Bukti Pengadaan" name="nama_barang" value="{{ old('nama_barang') }}">
                                  @error('nama_barang') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                
                                <label for="bukti_pengadaan">Upload Gambar</label>
                                <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="bukti_pengadaan" name="bukti_pengadaan" accept=".png, .jpg, .jpeg">
                                </fieldset>
                                @error('bukti_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Pengadaan</label>
                                  <select class="form-control @error('id_pengadaan') is-invalid @enderror" name="id_pengadaan" id="id_pengadaan" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($pengadaan as $k)
                                  <option value="{{$k->id_pengadaan}}">{{$loop->iteration}}. {{$k->tgl_pengadaan}}</option>
                                  @endforeach     
                                  </select>
                                  @error('id_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
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