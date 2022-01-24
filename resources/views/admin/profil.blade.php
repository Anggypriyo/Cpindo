@extends('admin/komponen-admin/master')

@section('title','Profil')

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
                                <h4 class="card-title">Tabel Profil</h4>
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
                                                <th>Nama profil</th>
                                                <th>Kategori profil</th>
                                                <th>Foto Profil</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($profil as $k)
                                            <tr>
                                                <td>{{$k->judul_profil}}</td>
                                                <td>{{$k->katprof->nama_katprof}}</td>
                                                <td>
                                                @if($k->path_profil == null)
                                                <img src="{{asset($k->path_profil)}}" style="width:150px;height:150px">
                                                @else
                                                <img src="{{ $k->path_profil }}" style="width:150px;height:150px">
                                                @endif
                                                </td>
                                                <td>
                                                <button class="badge badge-success" data-toggle="modal" data-target="#editModal{{$k->id_profil}}">Edit</button>
                                                <button class="badge badge-danger" data-toggle="modal" data-target="#deleteModal{{$k->id_profil}}">Delete</button>
                                                </td>
            <!-- Modal Edit -->
              <div class="modal fade" id="editModal{{$k->id_profil}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="{{url('/admin/profil/update/'.$k->id_profil)}}" enctype="multipart/form-data">
                          @method('patch')
                          @csrf
                              <div class="form-group">
                                  <label for="judul_profil">Judul Profil</label>
                                  <input type="text" class="form-control @error('judul_profil') is-invalid @enderror" id ="judul_profil" placeholder="Masukkan Judul Profil" name="judul_profil" value="{{ $k->judul_profil }}">
                                  @error('judul_profil') <div class="invalid-feedback">{{$message}} </div>@enderror
                              </div>
							                <!--<div class="form-group">
                                  <label for="path_profil">Path About</label>
                                  <input type="text" class="form-control @error('path_profil') is-invalid @enderror" id ="path_profil" placeholder="Masukkan Path About" name="path_profil" value="{{ $k->path_profil }}">
                                  @error('path_profil') <div class="invalid-feedback">{{$message}} </div>@enderror
                              </div>-->
                              <div class="form-group">
                                  <label for="exampleFormControlSelect1">Nama Kategori Profil</label>
                                  <select class="form-control @error('id_katprof') is-invalid @enderror" name="id_katprof" id="exampleFormControlSelect1" >
                                  <option value="{{$k->katprof->id_katprof}}">{{$k->katprof->nama_katprof}}</option>
                                  
                                  </select>
                                  @error('id_katprof') <div class="invalid-feedback">{{$message}}</div>@enderror
                              </div>
                              @if($k->id_katprof == 2)
                                <div class="form-group">
                                  <div class="upload" id="" style="display:block">
                                  <label for="path_profil">Upload Gambar Tampilan Utama</label>

                                          <div class="item form-group" style="margin-right:-40px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                                <input type="file" id="tampilan_utama" name="tampilan_utama" accept=".png, .jpg, .jpeg">
                                            </div>
                                          </div>                                      
                                  @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                                </div>
                              <input type="text" hidden class="form-control @error('tampilan_utama2') is-invalid @enderror" id ="tampilan_utama2" placeholder="" name="tampilan_utama2" value="{{$k->path_profil}}">
                              @elseif($k->id_katprof == 3)
                              <div class="form-group">
                                  <div class="upload" id="" style="display:block">
                                  <label for="path_profil">Upload Lokasi</label>

                                          <div class="item form-group" style="margin-right:-40px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                                <input type="file" id="tampilan_utama" name="lokasi" accept=".png, .jpg, .jpeg">
                                            </div>
                                          </div>
                                  @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                              </div>
                              <input type="text" hidden class="form-control @error('lokasi2') is-invalid @enderror" id ="lokasi2" placeholder="" name="lokasi2" value="{{$k->path_profil}}">
                              @elseif($k->id_katprof == 4)
                              <div class="form-group">
                                  <div class="upload" id="" style="display:block">
                                  <label for="path_profil">Upload Foto Deskripsi</label>

                                          <div class="item form-group" style="margin-right:-40px;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                            <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                                <input type="file" id="foto_deskripsi" name="foto_deskripsi" accept=".png, .jpg, .jpeg">
                                            </div>
                                          </div>
                                  @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                              </div>
                              <input type="text" hidden class="form-control @error('foto_deskripsi2') is-invalid @enderror" id ="foto_deskripsi2" placeholder="" name="foto_deskripsi2" value="{{$k->path_profil}}">
                              @endif
                              @error('id_pengguna') <div class="invalid-feedback">{{$message}} </div>@enderror
                                  <button type="sumbit" class="btn btn-primary">Edit Data</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>         
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- end Modal -->
              <!-- The Modal Delete -->
                <div class="modal fade" id="deleteModal{{$k->id_profil}}">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                  
                      <!-- Modal Header -->
                      <div class="modal-header">
                      <h4 class="modal-title">Peringatan</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">
                      Yakin ingin Menghapus
                      </div>
                      
                      <!-- Modal footer -->
                      <div class="modal-footer">
                      <form action="{{url('/admin/profil/delete/'.$k->id_profil)}}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                      
                  </div>
                  </div>
                </div>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Profil</th>
                                                <th>Kategori Profil</th>
                                                <th>Foto Profil</th>
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
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="{{url('/admin/profil/store')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="judul_profil">Judul Profil</label>
                        <input type="text" class="form-control @error('judul_profil') is-invalid @enderror" id ="judul_profil" placeholder="Masukkan Judul Profil" name="judul_profil" value="{{ old('judul_profil') }}">
                        @error('judul_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
					            
                      <div class="form-group">
                                  <label for="exampleFormControlSelect1">Nama Kategori Profil</label>
                                  <select class="form-control @error('id_katprof') is-invalid @enderror" name="id_katprof" id="id_katprof1" onChange="dokumen1()" >
                                  <option value="">--- pilih data ---</option>
                                  @foreach($katprof as $k)
                                  <option value="{{$k->id_katprof}}">{{$loop->iteration}}. {{$k->nama_katprof}}</option>
                                  @endforeach
                                  </select>
                                  @error('id_katprof') <div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                      <div class="form-group">
                        <!--<input type="text" class="form-control @error('path_profil') is-invalid @enderror" id ="path_profil" placeholder="Masukkan Path About" name="path_profil" value="{{ old('path_profil') }}">-->
                        
                        <div class="upload" id="upload11" style="display:none">
                        <label for="path_profil">Upload Gambar Tampilan Utama</label>

                                <div class="item form-group" style="margin-right:-40px;">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                      <input type="file" id="tampilan_utama" name="tampilan_utama" accept=".png, .jpg, .jpeg">
                                  </div>
                                </div>
                             
                        @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                      <div class="form-group">
                        <!--<input type="text" class="form-control @error('path_profil') is-invalid @enderror" id ="path_profil" placeholder="Masukkan Path About" name="path_profil" value="{{ old('path_profil') }}">-->
                        
                        <div class="upload" id="upload12" style="display:none">
                        <label for="path_profil">Upload Gambar Lokasi</label>
                                <div class="item form-group" style="margin-right:-40px;">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                      <input type="file" id="lokasi" name="lokasi" accept=".png, .jpg, .jpeg">
                                  </div>
                                </div>
                        @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                      <div class="form-group">
                        <!--<input type="text" class="form-control @error('path_profil') is-invalid @enderror" id ="path_profil" placeholder="Masukkan Path About" name="path_profil" value="{{ old('path_profil') }}">-->
                        
                        <div class="upload" id="upload13" style="display:none">
                        <label for="path_profil">Upload Gambar Foto Deskripsi</label>
                                <div class="item form-group" style="margin-right:-40px;">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left; margin-right: -100px;" >Gambar<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-6 col-xs-12" style="margin-left:60px;">
                                      <input type="file" id="foto_deskripsi" name="foto_deskripsi" accept=".png, .jpg, .jpeg">
                                  </div>
                                </div>
                        @error('path_profil') <div class="invalid-feedback">{{$message}}</div>@enderror
                      </div>
                      </div>
					  @error('id_pengguna') <div class="invalid-feedback">{{$message}}</div>@enderror
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    </div>
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
<script>
  //mengambil tanggal otomatis hari ini

    //function to show input file
    function dokumen1(){
      var doc = document.getElementById('id_katprof1').value;
      console.log(doc);
      if(doc == '2'){
        document.getElementById('upload11').style.display='block';
        document.getElementById('upload12').style.display='none';
        document.getElementById('upload13').style.display='none';
      }
      else if(doc == '3'){
        document.getElementById('upload12').style.display='block';
        document.getElementById('upload11').style.display='none';
        document.getElementById('upload13').style.display='none';
      }else if(doc == '4'){
        document.getElementById('upload12').style.display='none';
        document.getElementById('upload11').style.display='none';
        document.getElementById('upload13').style.display='block';
      }
      else{
        document.getElementById('upload11').style.display='none';
        document.getElementById('upload12').style.display='none';
        document.getElementById('upload13').style.display='none';
      }
    }
  
    function dokumen(){
      var doc = document.getElementById('nama_katprof').value;
      console.log(doc);
      if(doc == 'tampilan_utama'){
        document.getElementById('upload11').style.display='block';
      }
    }
  </script>
@endsection