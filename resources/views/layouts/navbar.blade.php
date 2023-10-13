<!-- Navbar Header -->
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand text" href="#">Kalkulator Sampah</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link text" href="{{ route('home') }}">Home</a>
      <a class="nav-link text" href="{{ route('jual') }}">Jual Sampah</a>
      <a class="nav-link text" href="{{ route('list') }}">List Penjualan</a>
    </div>
  </div>
  <a class="nav-link text float-right" href="{{ route('login') }}">Login</a>
</nav>