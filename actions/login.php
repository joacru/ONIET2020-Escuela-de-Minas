<?php

session_start();

if( isset($_POST['email']) && isset($_POST['password'])  ){ 
    include('./data_connect.php');
    
    $email = $_POST['email'];
    $password = $_POST['password']; 

    
    $query = "SELECT id FROM usuarios WHERE email = '$email' AND password = '$password' ";
    $response = $conexion -> query($query);

    if( $response->num_rows>0  ){

            $row = $response->fetch_assoc(); 
            $id = $row['id'];

            $time = time();

            $query = " UPDATE usuarios SET acceso = '$time' WHERE id='$id'";
            $conexion -> query($query);

            $_SESSION['id'] = $id;

    }

}

//echo isset($_SESSION['id']);
//header( 'Refresh:2; url=index.php' );
header("Location: ../index.php");

?>