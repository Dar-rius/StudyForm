<!-- cote serveur de la page auth-->

<?php
    /* importation du fichier de connexion vers la base de
     Donnee */
        include '../config.php';

session_start();


    /* verification si le nom et password sont hesiste dans le BD */
        $query = "SELECT * FROM admins WHERE adminName = :adminName AND password = :password";  
        $statement = $bd->prepare($query);  
        $statement->execute(  
                array(  
                'adminName'=> $_POST["adminName"],  
                'password'=>$_POST["password"]  
                )  
        );  

        $count = $statement->rowCount();  
        
        if($count > 0)  
        {  
                $_SESSION["adminName"] = $_POST["adminName"];
                echo '<script>
                    location.href="admin.php";
                </script>';
        }  
        else  
        {  
                $message = "Le nom d'utilisateur ou le mot de passe est incorrecte";
                echo '<script>
                    location.href="auth.php";
                </script>';
        }  
   