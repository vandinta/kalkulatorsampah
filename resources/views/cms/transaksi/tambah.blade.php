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
            <h4 class="card-title">Tambah Data Transaksi</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('transaksi.index') }}" type="button" class="btn btn-primary btn-round ml-2">kembali</a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-lg-12">
              <form action="{{ route('transaksi.store') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama User</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama User" value="{{ old('nama') }}" autofocus>
                </div>
                <div class="form-group">
                  <label for="sampah">Kategori Sampah</label>
                  <select class="form-control" id="id_sampah" name="id_sampah" onchange="Hitung(this);" autofocus>
                    <option value=""></option>
                    @foreach ($sampah as $sp)
                    <option data-harga="<?= $sp['harga'] ?>" data-nama="<?= $sp['nama'] ?>" value="<?= $sp['id'] ?>"><?= $sp['nama'] ?></option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="berat">Berat Sampah</label>
                  <input type="number" class="form-control" id="berat" name="berat" placeholder="Berat Sampah" value="{{ old('berat') }}" onchange="Hitung(this);" autofocus>
                </div>
                <div class="form-group">
                  <label for="harga">Harga Total</label>
                  <input type="number" class="form-control" id="harga" name="harga[]" placeholder="Harga Total" value="{{ old('harga') }}" disabled>
                </div>
                <input type="hidden" id="harga_hide" name="harga_hide[]">
                <div class="form-group">
                  <label for="status">Status Transaksi</label>
                  <select class="form-control" id="status" name="status" autofocus>
                    <option value=""></option>
                    <option value="done">Done</option>
                    <option value="panding">Panding</option>
                    <option value="cancel">Cancel</option>
                  </select>
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

<script>
  function Hitung(v) {
    var harga = $('#id_sampah option:selected').data('harga');
    var jumlah = $("#berat").val();

    var total = harga * jumlah;

    $('#harga_sampah').val(harga);
    $('#harga').val(total);
    $('#harga_hide').val(total);
  }
</script>
@endsection