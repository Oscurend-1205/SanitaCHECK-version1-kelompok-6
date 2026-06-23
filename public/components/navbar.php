<!-- components/navbar.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="/beranda.php">
      <img src="/assets/images/logo-sanita.png" alt="SanitaCheck Logo" width="30" height="30" class="me-2" style="object-fit: contain;"> SanitaCheck
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'beranda.php' ? 'active' : '' ?>" href="/beranda.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'fasilitas.php' || basename($_SERVER['PHP_SELF']) == 'detail-fasilitas.php' ? 'active' : '' ?>" href="/fasilitas.php">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'lapor.php' ? 'active' : '' ?>" href="/lapor.php">Lapor</a>
        </li>
      </ul>
      <form class="d-flex" action="/fasilitas.php" method="GET">
        <input class="form-control me-2" type="search" name="search" placeholder="Cari fasilitas..." aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Cari</button>
      </form>
    </div>
  </div>
</nav>
