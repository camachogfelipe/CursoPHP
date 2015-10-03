<?php
!defined(BASE_URL) or exit("No puede acceder directamente al script.");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title><?= $this->title ?></title>
<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/assets/bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/assets/css/directorio.css">
</head>

<body>
<header class="page-header">
	<h2>Curso de MySQL/PHP <small>Días sábados</small></h2>
	
	
</header>
<?php if(isset($_SESSION) and !empty($_SESSION)) : ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?= BASE_URL ?>?c=directorio" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Directorio <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= BASE_URL ?>?c=usuarios&f=salir"><i class="glyphicon glyphicon-off"></i> Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php endif; ?>
<div class="container">