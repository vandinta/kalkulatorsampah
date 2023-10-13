<!doctype html>
<html lang="en">

@include('layouts.header')

<body>
  <!-- Navbar -->
  @include('layouts.navbar')

  <!-- Content -->
  <div class="container mt-3">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <h4 class="card-title">List Penjualan Sampah</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="add-row" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th style="width: 20px; text-align: center;">No</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Kategori</th>
                <th style="text-align: center;">Berat</th>
                <th style="text-align: center;">Harga</th>
                <th style="text-align: center;">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transaksi as $ts)
              <tr>
                <td style="text-align: center;">{{ $no++ }}</td>
                <td style="text-align: center;">{{ $ts->nama }}</td>
                <td style="text-align: center;">{{ $ts->sampah }}</td>
                <td style="text-align: center;">{{ $ts->berat }} Kg</td>
                <td style="text-align: center;">Rp. {{ $ts->harga }}</td>
                <td style="text-align: center;">{{ $ts->status }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footer')

  @include('layouts.js')

</body>

</html>