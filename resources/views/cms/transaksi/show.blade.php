@extends('cms.layouts.template')

@section('content')
<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">Data Transaksi</h4>
    <ul class="breadcrumbs">
      <li class="nav-item">
        <a href="{{ route('transaksi.index') }}">Data Transaksi</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Detail Transaksi</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('transaksi.index') }}" type="button" class="btn btn-primary btn-round ml-2">kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Nama:</strong>
                {{ $transaksi->nama }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Kategori:</strong>
                @foreach ($sampah as $sp)
                {{ $transaksi->id_sampah == $sp['id'] ? $sp['nama'] : ''}}
                @endforeach
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Berat:</strong>
                {{ $transaksi->berat }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Harga:</strong>
                {{ $transaksi->harga }}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>Status:</strong>
                {{ $transaksi->status }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection