@extends('admin/komponen-admin/master')

@section('title','Pengadaan')

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
                                <h4 class="card-title">Tabel Pengadaan</h4>
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
                                                <th>Bukti Pengadaan</th>
                                                <th>Status Pengadaan</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th>Keterangan Pengadaan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pengadaan as $k)
                                            <tr>
                                                <td>
                                                @if($k->bukti_pengadaan == null)
                                                <img src="{{asset($k->bukti_pengadaan)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->bukti_pengadaan }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                @if($k->status_pengadaan == 0)
                                                <td>Proses</td>
                                                @elseif($k->status_pengadaan == 1)
                                                <td>Selesai</td>
                                                @else
                                                <td>Dibatalkan</td>
                                                @endif
                                                <td>{{$k->tgl_pengadaan}}</td>
                                                <td>{{$k->ket_pengadaan}}</td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_pengadaan}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_pengadaan}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$k->id_pengadaan}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit pengadaan</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="col-lg-4">
                                                        <img src="{{asset($k->bukti_pengadaan)}}" alt="image" class="img-thumbnail"
                                                            width="290">
                                                        <p class="mt-3 mb-0">
                                                    </div>
                                                    <form method="post" action="{{url('/admin/pengadaan/update/'.$k->id_pengadaan)}}" enctype="multipart/form-data">
                                                            @method('patch')
                                                            @csrf
                                                            <label for="bukti_pengadaan">Upload Bukti Pengadaan</label>
                                                                    <fieldset class="form-group">
                                                                            <input type="file" class="form-control-file" id="bukti_pengadaan" name="bukti_pengadaan" accept=".png, .jpg, .jpeg">
                                                                            <input type="text" class="form-control @error('bukti_pengadaan') is-invalid @enderror" id ="bukti_pengadaan" placeholder="Masukkan bukti pengadaan" name="bukti_pengadaan2" hidden value="{{ $k->bukti_pengadaan }}">
                                                                    </fieldset>
                                                                    @error('bukti_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                <div class="form-group">
                                                                    <label for="tgl_pengadaan">Tanggal Pengadaan</label>
                                                                    <input type="text" class="form-control @error('tgl_pengadaan') is-invalid @enderror" id ="tgl_pengadaan" name="tgl_pengadaan" value="{{ $k->tgl_pengadaan }}">
                                                                    @error('tgl_pengadaan') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Status Pengadaan</label>
                                                                    <select class="form-control @error('status_pengadaan') is-invalid @enderror" name="status_pengadaan" id="exampleFormControlSelect1" >
                                                                    @if($k->status_pengadaan == 0)
                                                                    <option value="{{$k->status_pengadaan}}">Proses</option>
                                                                    <option value="1">Selesai</option>
                                                                    <option value="2">Dibatalkan</option>
                                                                    @elseif($k->status_pengadaan == 1)
                                                                    <option value="{{$k->status_pengadaan}}">Selesai</option>
                                                                    <option value="0">Proses</option>
                                                                    <option value="2">Dibatalkan</option>
                                                                    @else
                                                                    <option value="{{$k->status_pengadaan}}">Dibatalkan</option>
                                                                    <option value="0">Proses</option>
                                                                    <option value="1">Selesai</option>
                                                                    @endif
                                                                    </select>
                                                                    @error('status_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ket_pengadaan">Keterangan pengadaan</label>
                                                                    <textarea class="form-control @error('ket_pengadaan') is-invalid @enderror" rows="3" placeholder="Text Here..." id ="ket_pengadaan" name="ket_pengadaan">{{ $k->ket_pengadaan }}</textarea>
                                                                    @error('ket_pengadaan') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                                                    
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
                                                <div class="modal fade" id="deleteModal{{$k->id_pengadaan}}">
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
                                                        <form action="{{url('/admin/pengadaan/delete/'.$k->id_pengadaan)}}" method="post">
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
                                                <th>Status Pengadaan</th>
                                                <th>Tanggal Pengadaan</th>
                                                <th>Keterangan Pengadaan</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah pengadaan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/pengadaan/store')}}" enctype="multipart/form-data">
                                @csrf
                                <label for="bukti_pengadaan">Upload Bukti pengadaan</label>
                                <fieldset class="form-group">
                                        <input type="file" class="form-control-file" id="bukti_pengadaan" name="bukti_pengadaan" accept=".png, .jpg, .jpeg">
                                </fieldset>
                                @error('bukti_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror

                                                                <div class="form-group">
                                                                    <label for="tgl_pengadaan">Tanggal pengadaan</label>
                                                                    <input type="datetime-local" class="form-control @error('tgl_pengadaan') is-invalid @enderror" id ="tgl_pengadaan" placeholder="Masukkan Tanggal Pengadaan" name="tgl_pengadaan" value="{{ old('tgl_pengadaan') }}">
                                                                    @error('tgl_pengadaan') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Status pengadaan</label>
                                                                    <select class="form-control @error('status_pengadaan') is-invalid @enderror" name="status_pengadaan" id="exampleFormControlSelect1" >
                                                                    <option value="">=== Pilih Status ===</option>
                                                                    <option value="0">Proses</option>
                                                                    <option value="1">Selesai</option>
                                                                    <option value="2">Dibatalkan</option>
                                                                    </select>
                                                                    @error('status_pengadaan') <div class="invalid-feedback">{{$message}}</div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="ket_pengadaan">Keterangan pengadaan</label>
                                                                    <textarea class="form-control @error('ket_pengadaan') is-invalid @enderror" rows="3" placeholder="Text Here..." id ="ket_pengadaan" name="ket_pengadaan" value="{{ old('ket_pengadaan') }}">{{ $k->ket_pengadaan }}</textarea>
                                                                    @error('ket_pengadaan') <div class="invalid-feedback">{{$message}} </div>@enderror
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