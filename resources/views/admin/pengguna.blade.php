@extends('admin/komponen-admin/master')

@section('title','Pengguna')

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
                                <h4 class="card-title">Tabel Pengguna</h4>
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
                                                <th>Nama Pengguna</th>
						<th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pengguna as $p)
                                            <tr>
                                                <td>{{$p->name}}</td>
                                                <td>{{$p->email}}</td>
						<td>@if($p->is_admin == 0) Operator @else Admin @endif</td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$p->id}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$p->id}}">Delete</button>
                                                </td>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                                                        <button type="button" class="close" data-dismiss ="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form method="post" action="{{url('/admin/pengguna/update/'.$p->id)}}">
                                                            @method('patch')
                                                            @csrf
                                                                <div class="form-group">
                                                                    <label for="nama_pengguna">Nama Pengguna</label>
                                                                    <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id ="nama_pengguna" placeholder="Masukkan Nama Pengguna" name="nama_pengguna" value="{{ $p->name }}">
                                                                    @error('nama_pengguna') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email_pengguna">Email</label>
                                                                    <input type="text" class="form-control @error('email_pengguna') is-invalid @enderror" id ="email_pengguna" placeholder="Masukkan Email Pemesanan" name="email_pengguna" value="{{ $p->email }}">
                                                                    @error('email_pengguna') <div class="invalid-feedback">{{$message}} </div>@enderror
                                                                </div>
								<h5> Role Pengguna</h5>
                                				@if($p->is_admin == 0)
                                	`			<div class="form-check form-check-inline">
                                    				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_admin" value="1">
                                    				    <label class="form-check-label" for="role_pengguna_admin">Admin</label>
                                				</div>
                                				<div class="form-check form-check-inline">
                                    				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_operator" value="0" checked>
                                    				    <label class="form-check-label" for="role_pengguna_operator">Operator</label>
                                				</div>
								@else
								<div class="form-check form-check-inline">
                                    				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_admin" value="1" checked>
                                    				    <label class="form-check-label" for="role_pengguna_admin">Admin</label>
                                				</div>
                                				<div class="form-check form-check-inline">
                                    				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_operator" value="0">
                                    				    <label class="form-check-label" for="role_pengguna_operator">Operator</label>
                                				</div>
								@endif
								<br><br>
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
                                                <div class="modal fade" id="deleteModal{{$p->id}}">
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
                                                        <form action="{{url('/admin/pengguna/delete/'.$p->id)}}" method="post">
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
                                                <th>Nama Pengguna</th>
						<th>Email</th>
                                                <th>Harga</th>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                              <form method="post" action="{{url('/admin/pengguna/store')}}">
                                @csrf
                                <div class="form-group">
                                  <label for="nama_pengguna">Nama Pengguna</label>
                                  <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id ="nama_pengguna" placeholder="Masukkan Nama Pengguna" name="nama_pengguna" value="{{ old('nama_pengguna') }}">
                                  @error('nama_pengguna') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                                <div class="form-group">
                                  <label for="email_pengguna">Email Pengguna</label>
                                  <input type="text" class="form-control @error('email_pengguna') is-invalid @enderror" id ="email_pengguna" placeholder="Masukkan Email Pengguna" name="email_pengguna" value="{{ old('email_pengguna') }}">
                                  @error('email_pengguna') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
				<h5> Role Pengguna</h5>
				<div class="form-check form-check-inline">
				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_admin" value="1">
				    <label class="form-check-label" for="role_pengguna_admin">Admin</label>
				</div>
				<div class="form-check form-check-inline">
				    <input class="form-check-input" type="radio" name="role_pengguna" id="role_pengguna_operator" value="0">
				    <label class="form-check-label" for="role_pengguna_operator">Operator</label>
				</div>
				<br><br>
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