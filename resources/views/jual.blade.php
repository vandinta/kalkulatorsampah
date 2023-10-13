<!doctype html>
<html lang="en">

@include('layouts.header')

<body>
  <!-- Navbar -->
  @include('layouts.navbar')

  <!-- Content -->
  <div class="container mt-3">
    @if ($message = Session::get('berhasil'))
    <div class="alert alert-success" role="alert">
      <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger">
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

    <h2>Jual Sampah Anda</h2>

    <form action="{{ route('jual') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}" autofocus>
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
      <button type="submit" class="btn btn-outline-success float-right">Tambah</button>
    </form>
    <br><br>
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

  @include('layouts.footer')

  @include('layouts.js')

</body>

</html>