<nav class="navbar  navbar-expand-lg bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cours</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'get' ? 'active' : '' ?>"  href="get.php">$_GET</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === 'post' ? 'active' : '' ?>" href="post.php">$_POST</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
