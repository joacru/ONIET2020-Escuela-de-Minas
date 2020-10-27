<?php

    session_start();
            
            include('./check_session.php');
            //if($user_online)      unset($_SESSION['id']);
            //header( 'Refresh:2; url=index.php' );
            if(isset($_SESSION["id"])) unset($_SESSION['id']);

    session_destroy();

    header("Location: ../index.php")

?>