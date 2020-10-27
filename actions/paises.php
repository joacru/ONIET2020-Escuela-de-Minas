
<?php

include('actions/data_connect.php');

$query = "SELECT name,codigo FROM paises";
$response = $conexion -> query($query);

$paises = array();

if($response -> num_rows >0 ){
    while($row = $response->fetch_assoc()){
        $name = $row['name'];
        $codigo = $row['codigo'];
        $paises[] = ['name' => $name, 'codigo' => $codigo ];
    }
}




?>