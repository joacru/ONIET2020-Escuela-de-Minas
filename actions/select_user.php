<?php

    
    //session_start();
    include('check_session.php');
    include('actions/data_connect.php');

    if($user_online){

            $id = $_SESSION['id'];
            

            $query = "SELECT pais FROM usuarios WHERE id = '$id' ";
            $response = $conexion -> query($query);
        
            if( $response -> num_rows >0 ){
               
                $row = $response->fetch_assoc(); 
                $codigo = $row['pais'];                                             //Codigo

                $query = " SELECT name FROM paises WHERE codigo = '$codigo' ";
                $response = $conexion -> query($query);



                $row = $response->fetch_assoc();
                $pais = $row['name'];                                               //Nombre del pais
                
                
                $query = "SELECT name,apellido,email,domicilio,acceso FROM usuarios WHERE id = '$id' ";
                $response = $conexion -> query($query);

                $row = $response->fetch_assoc();
                $name = $row['name'];                                               //Nombre del user
                $apellido = $row['apellido'];                                       //Apellido del user
                $email = $row['email'];                                             //Email del user
                $domicilio = $row['domicilio'];                                     //Domicilio del user
                $acceso = $row['acceso'];                                           //Ultimo acceso del user
                $fecha = date('j/n/Y H:i:s', $acceso);	

                $datos = array(				  		                             	//Transformarlo a array
                    'name' => $name, 
                    'apellido' => $apellido, 
                    'email' =>  $email,
                    'domicilio' => $domicilio,
                    'acceso' => $fecha,
                    'codigo' => $codigo,
                    'pais' => $pais
                );
                
            }

    }




?>