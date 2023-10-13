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
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Detail Sampah</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('sampah.index') }}" type="button" class="btn btn-primary btn-round ml-2">kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Foto:</strong>
                {{ $sampah->foto }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Nama:</strong>
                {{ $sampah->nama }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Harga:</strong>
                {{ $sampah->harga }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Deskripsi:</strong>
                {{ $sampah->deskripsi }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection