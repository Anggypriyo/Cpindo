@extends('admin/komponen-admin/master')

@section('title','Detail Pemesanan')

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
                                <h4 class="card-title">Tabel Detail Pemesanan</h4>
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
                                                <th>Keterangan Pemesanan</th>
                                                <th>Total Harga</th>
                                                <th>Bukti Pemesanan</th>
                                                <th>Tanggal Pengambilan</th>
                                                <th>Status Pemesanan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detpem as $k)
                                            <tr>
                                                <td>{{$k->pemesanan->ket_pemesanan}}</td>
                                                <td>{{$k->total_harga}}</td>
                                                <td>
                                                @if($k->pemesanan->bukti_pemesanan == null)
                                                <img src="{{asset($k->pemesanan->bukti_pemesanan)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->pemesanan->bukti_pemesanan }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>{{$k->pemesanan->tgl_pengambilan}}</td>
                                                <td>{{$k->pemesanan->status_pemesanan}}</td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_detpem}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_detpem}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$k->id_detpem}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit menu</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-4">
                                                        <img src="{{asset($k->pemesanan->bukti_pemesanan)}}" alt="image" class="img-thumbnail"
                                                            width="290">
                                                        <p class="mt-3 mb-0">
                                                    </div>
                                                    <form method="post" action="{{url('/admin/detpem/update/'.$k->id_detpem)}}" enctype="multipart/form-data">
                                                            @method('patch')
                                                            @csrf
                                                                <div class="form-group">
                                                                    <label for="total_harga">Total_Harga</label>
                                                                    <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id ="total_harga" placeholder="Masukkan Total Harga" name="total_harga" value="{{ $k->total_harga }}">
                                                                    @error('total_harga') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Pemesanan</label>
                                                                    <select class="form-control @error('id_pemesanan') is-invalid @enderror" name="id_pemesanan" id="exampleFormControlSelect1" >
                                                                    <option value="{{$k->pemesanan->id_pemesanan}}">{{$k->pemesanan->ket_pemesanan}} {{$k->pemesanan->tgl_pengambilan}}</option>
                                                                    @foreach($pemesanan as $k)
                                                                    <option value="{{$k->id_pemesanan}}">{{$loop->iteration}}. {{$k->ket_pemesanan}} {{$k->tgl_pengambilan}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('id_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">menu</label>
                                                                    <select class="form-control @error('id_menu') is-invalid @enderror" name="id_menu" id="exampleFormControlSelect1" >
                                                                    <option value="{{$k->id_menu}}">{{$k->nama_menu}}</option>
                                                                    @foreach($menu as $k)
                                                                    <option value="{{$k->id_menu}}">{{$loop->iteration}}. {{$k->nama_menu}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                    @error('id_menu') <div class="invalid-feedback">{{$message}}</div>@enderror
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
                                                <div class="modal fade" id="deleteModal{{$k->id_detpem}}">
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
                                                        <form action="{{url('/admin/detpem/delete/'.$k->id_detpem)}}" method="post">
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
                                                <th>Keterangan Pemesanan</th>
                                                <th>Total Harga</th>
                                                <th>Bukti Pemesanan</th>
                                                <th>Tanggal Pengambilan</th>
                                                <th>Status Pemesanan</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Pemesanan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/detpem/store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Pemesanan</label>
                                  <select class="form-control @error('id_pemesanan') is-invalid @enderror" name="id_pemesanan" id="id_pemesanan" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($pemesanan as $k)
                                  <option value="{{$k->id_pemesanan}}">{{$loop->iteration}}. {{$k->ket_pemesanan}} {{$k->tgl_pengambilan}}</option>
                                  @endforeach     
                                  </select>
                                  @error('id_pemesanan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Menu</label>
                                  <select class="form-control @error('id_menu') is-invalid @enderror" name="id_menu" id="id_menu" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($menu as $k)
                                  <option value="{{$k->id_menu}}">{{$loop->iteration}}. {{$k->nama_menu}}</option>
                                  @endforeach     
                                  </select>
                                  @error('id_menu') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="total_harga">Total Harga </label>
                                  <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id ="total_harga" placeholder="Masukkan Total Harga" name="total_harga" value="{{ old('total_harga') }}">
                                  @error('total_harga') <div class="invalid-feedback">{{$message}}</div>@enderror
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