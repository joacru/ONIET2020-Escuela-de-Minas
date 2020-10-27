<?php

  include("actions/select_user.php");

?>

<div class="dashboard-box">

  <div class="row row-md-6">
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Datos del usuario
        </div>
        <div class="panel-body">
          <label>Apellido: </label>
          <span><?php echo $datos['apellido'] ?></span>
          <br>
          <label>Nombre: </label>
          <span><?php echo $datos['name'] ?></span>
          <br>
          <label>Correo electrónico: </label>
          <span><?php echo $datos['email'] ?></span>
          <br>
          <label>Domicilio: </label>
          <span><?php echo $datos['domicilio'] ?></span>
          <br>
          <label>Última acceso: </label>
          <span><?php echo $datos['acceso'] ?></span>
          <br>
          <label>País: </label>
          <span><?php echo $datos['pais'] ?></span>
          <br>
          <a class="btn btn-primary logout-button" href="index.php?tab=edit">Editar datos</a>
          <a class="btn btn-primary logout-button" href="actions/logout.php">Cerrar sesión</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Datos del país
        </div>
        <div class="panel-body" id="infoDeApi">
        </div>
      </div>
    </div>
  </div>

</div>

<script>window.country = "<?php echo $datos['codigo']; ?>"</script>
<script src="js/public/build/bundle.js"></script>