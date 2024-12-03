<!-- Navigation Bar -->



<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <li class="lien <?php echo esOpcionMenuActiva('/') ? 'active' : ''; ?>">
          <a href="<?php generarHref('/') ?>"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('/about') ? 'active' : ''; ?>">
          <a href="<?php generarHref('/about') ?>"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>
        <li class="lien <?php echo existeOpcionMenuActivaEnArray(['/blog', '/post']) ? 'active' : ''; ?>">
          <a href="<?php generarHref('/blog') ?>"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('/contact') ? 'active' : ''; ?>">
          <a href="<?php generarHref('/contact') ?>"><i class="fa fa-phone-square sr-icons"></i> Contacto</a>
        <li class="lien <?php echo esOpcionMenuActiva('/galery') ? 'active' : ''; ?>">
          <a href="<?php generarHref('/galery') ?>"><i class="fa fa-image sr-icons"></i> Galery</a>
        </li>
        <li class="lien <?php echo esOpcionMenuActiva('/partners') ? 'active' : ''; ?>">
          <a href="<?php generarHref('/partners') ?>"><i class="fa fa-hand-o-right"></i> Partner</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End of Navigation Bar -->