<?php

  include("actions/select_user.php");
  include("actions/paises.php");

?>

<div class="login-box">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Actualizar datos
    </div>
    <div class="panel-body">
      <form action="actions/users_update.php" method="POST">
        <div class="form-group">
          <label for="in-apellido">Apellido:</label>
          <input type="text" name="apellido" class="form-control" id="in-apellido" value="<?php echo $datos['apellido'] ?>">
        </div>
        <div class="form-group">
          <label for="in-nombre">Nombre:</label>
          <input type="text" name="name" class="form-control" id="in-nombre" value="<?php echo $datos['name'] ?>">
        </div>
        <div class="form-group">
          <label for="in-contrasena">Contraseña:</label>
          <input type="password" name="password" class="form-control" id="in-contrasena" placeholder="Dejar en blanco si no se desea modificar la contraseña">
        </div>
        <div class="form-group">
          <label for="in-domicilio">Domicilio:</label>
          <input type="text" name="domicilio" class="form-control" id="in-domicilio" value="<?php echo $datos['domicilio'] ?>">
        </div>
        <div class="form-group">
          <label for="in-pais">País:</label>
          <select name="pais" class="form-control" id="in-pais">
            <?php
            foreach ($paises as $i => $pais) {
              if($pais['codigo'] == $datos['codigo']){
                ?>
                  <option value="<?php echo $pais['codigo'] ?>" selected="selected">
                    <?php echo $pais['name'] ?>
                  </option>
                <?php
              } else{
                ?>
                  <option value="<?php echo $pais['codigo'] ?>">
                    <?php echo $pais['name'] ?>
                  </option>
                <?php
              }
            }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
      </form>
      <br>
      <a href="index.php?tab=main" class="btn btn-primary">Volver a la página de inicio</a>
    </div>
  </div>
</div>