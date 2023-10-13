<!doctype html>
<html lang="en">

@include('layouts.header')

<body>
  <!-- Navbar -->
  @include('layouts.navbar')

  <div class="container mt-4">
    <div class="row">
      <div class="card-body">
        <div class="chart-container" style="height: 350px">
          <canvas id="multipleLineChart"></canvas>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <h4 class="card-title">Daftar Harga Beli Sampah</h4>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="add-row" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th style="width: 40px; text-align: center;">No</th>
                <th style="text-align: center;">Jenis Sampah</th>
                <th style="text-align: center;">Harga</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sampah as $sp)
              <tr>
                <td style="text-align: center;">{{ $no++ }}</td>
                <td style="text-align: center;">{{ $sp->nama }}</td>
                <td style="text-align: center;">Rp. {{ $sp->harga }}</td>
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