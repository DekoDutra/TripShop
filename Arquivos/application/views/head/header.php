<header>
  <nav class="navbar navbar-default body" role="navigation">
    <div class="container-fluid container-navbar">
      <!-- MENU DE NAVEGAÇÃO -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-send"></span> TripShop</a>
      </div>

      <!-- TUDO QUE É LINK, DROPDOWN E ETC FICA AQUI -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul id="nav" class="nav navbar-nav">
          <li><a href="<?= base_url('admin/home') ?>">Home</a></li>
          <li><a href="<?= base_url('admin/users_admin') ?>">Usuarios de Administração</a></li>
          <li><a href="<?= base_url('admin/usuarios') ?>">Usuarios</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Açôes do Sistema <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?= base_url('admin/voos') ?>">Vôos <span class="glyphicon glyphicon-send right-transform"></span></a></li>
              <li><a href="<?= base_url('admin/festas') ?>">Festas <span class="glyphicon glyphicon-music right-transform"></span></a></li>
              <li><a href="<?= base_url('admin/hoteis') ?>">Hoteis <span class="glyphicon glyphicon-header right-transform"></span></a></li>
              <li><a href="<?= base_url('admin/carros') ?>">Carros <span class="glyphicon glyphicon-cars right-transform"></span></a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../admin/home/logout">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

</header>
