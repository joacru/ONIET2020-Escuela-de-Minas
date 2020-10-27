<?php

if( isset($_POST['name']) && isset($_POST['password']) && isset($_POST['apellido']) && isset($_POST['domicilio']) && isset($_POST['pais'])  ){ 
    
    include('./data_connect.php');

    session_start();
    include('check_session.php');

    if($user_online){

            $id = $_SESSION['id'];
           
                                                                                     //Update something
                $name = $_POST['name'];
                $password = $_POST['password'];
                $apellido = $_POST['apellido'];
                $domicilio = $_POST['domicilio'];
                $pais = $_POST['pais'];
            

    
                if( strlen($password) == 0 ){                                            //Name nuevo
                    $query = "SELECT password FROM usuarios WHERE id = '$id' ";
                    $response = $conexion -> query($query);
                    $row = $response->fetch_assoc();
                    $password = $row['password']; 
                }

                $query = "UPDATE usuarios SET name = '$name', password = '$password', apellido = '$apellido', domicilio = '$domicilio', pais = '$pais' WHERE id='$id'";
                $response = $conexion -> query($query);
                

    }
    

  
    //    UPDATE usuarios SET name = 'name', password = 'password', apellido = 'apellido', domicilio = 'domicilio', pais = 'pais';
    //    INSERT INTO usuarios(email,password,name,apellido,domicilio,pais,acceso) VALUES('hi','123','Ramon','Rodriguez','Alt. Brown', 'Argentina',CURTIME());

    if($conexion->error) die('Ocurrio un error en la query: '.$conexion->error);
    header("Location: ../index.php");


}









?>