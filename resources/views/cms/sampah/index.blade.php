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
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Sampah</h4>
            <div class="ml-auto">
            </div>
            <a href="{{ route('sampah.create') }}" type="button" class="btn btn-primary btn-round ml-2"><i class="fa fa-plus"></i> Tambah Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th style="width: 20px; text-align: center;">No</th>
                  <th style="text-align: center;">Foto</th>
                  <th style="text-align: center;">Nama</th>
                  <th style="text-align: center;">Harga</th>
                  <th style="text-align: center;">Deskripsi</th>
                  <th style="width: 235px; text-align: center;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sampah as $sp)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $sp->foto }}</td>
                  <td>{{ $sp->nama }}</td>
                  <td>{{ $sp->harga }}</td>
                  <td>{{ $sp->deskripsi }}</td>
                  <td>
                    <form action="{{ route('sampah.destroy',$sp->id) }}" method="POST">
                      <a href="{{ route('sampah.show',$sp->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Detail">
                          <i class="fa fa-eye"></i>
                        </button></a>
                      <a href="{{ route('sampah.edit',$sp->id) }}"><button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Ubah">
                          <i class="fa fa-edit"></i>
                        </button></a>

                      @csrf
                      @method('DELETE')

                      <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                        <i class="fa fa-times"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection