@extends('cms.layouts.template')

@section('content')
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Sampah</h4>
    <ul class="breadcrumbs">
      <li class="nav-item">
        <a href="{{ route('sampah.index') }}">Data Sampah</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      @if ($message = Session::get('berhasil'))
      <div class="alert alert-success" role="alert">
        <p>{{ $message }}</p>
      </div>
      @endif
      @if ($message = Session::get('gagal'))
      <div class="alert alert-danger" role="alert">
        <p>{{ $message }}</p>
      </div>
      @endif
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Tambah Data Sampah</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('sampah.index') }}" type="button" class="btn btn-primary btn-round ml-2">kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-lg-12">
              <form action="{{ route('sampah.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Jenis Sampah</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Jenis Sampah" value="{{ old('nama') }}" autofocus>
                </div>
                <div class="form-group">
                  <label for="harga">Harga Sampah</label>
                  <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Sampah" value="{{ old('harga') }}" autofocus>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Sampah</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Sampah" value="{{ old('deskripsi') }}" autofocus>
                </div>
                <div class="form-group">
                  <label for="foto">Foto Sampah</label>
                  <input type="text" class="form-control" id="foto" name="foto" placeholder="Foto Sampah" value="{{ old('foto') }}" autofocus>
                </div>
                <button type="submit" class="btn btn-outline-success float-right">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection