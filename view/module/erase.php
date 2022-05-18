<?php
    
    eraseUser();
     function eraseUser(){
        try {
            $objDtoUser = new User();
            $objDtoUser -> setCode($_GET["codigo"]);
            $objDaoUser = new UserModel($objDtoUser);

            if ($objDaoUser -> mldEraseUser() == true) {
                
                print "<script>
                
                swal.fire(
                    'hecho',
                    'tu registro ha sido eliminado.',
                    'genial'
                );

                
                </script>";

                include_once "view/module/user.php";
            }
        } catch (Exeption $e) {
            print "hubo un error al borrar ".$e ->getMesagge;
        }
    }

?>