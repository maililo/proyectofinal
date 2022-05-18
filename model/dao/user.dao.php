<?php

   // require_once "../model/conexion.php";
   // require_once "../model/dto/user.dto.php";
    class UserModel{

        private $code;
        private $user;
        private $password;
        private $name;
        private $lastname;

        public function __construct($objDtoUser){
           $this-> code     = $objDtoUser -> getCode();
           $this-> user     = $objDtoUser -> getUser();
           $this-> password = $objDtoUser -> getPassword();
           $this-> name     = $objDtoUser -> getName();
           $this-> lastname = $objDtoUser -> getLastname(); 
        }

        public function getQueryLogin(){

            $sql = "SELECT * FROM usuario
                    WHERE USER = ? AND PASSWORD = ?";
            
            try {
                $objcon = new Conexion();

                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> user, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> password, PDO::PARAM_STR);
                $stmt -> execute();

                $result = $stmt;

            } catch (Exception $e) {
                print "error al consultar usuario ". $e -> getMessage();
            }

            return $result;
        }

        public function mldInsertUser( ){
            $sql = "CALL `spInsertUser`(?, ?, ?, ?);";
            $estado = false;

            try {
                $objcon = new Conexion();

                $stmt = $objcon -> getConect() -> prepare($sql); 
                $stmt -> bindParam(1, $this -> name,        PDO::PARAM_STR);
                $stmt -> bindParam(2, $this -> lastname,    PDO::PARAM_STR);
                $stmt -> bindParam(3, $this -> user,        PDO::PARAM_STR);
                $stmt -> bindParam(4, $this -> password,    PDO::PARAM_STR);
                $estado = $stmt -> execute();
                
            } catch (exepcion $e) {
                print "error al insertar usuario";

        }
        return $estado;
    }

    public function mldSearchAllUser(){
        $sql = "call spSearchAllUser()";

        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> execute();
            $respon = $stmt;
            
        } catch (Exeption $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
        }
        return $respon;
    }

    public function mldEraseUser(){
        $sql ="call spDeleteUser(?)";

        $respon = false;
        try {
            $objcon = new Conexion();
            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> bindParam(1, $this -> code,        PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
            
        } catch (Exeption $e) {
            print "hubo un error al borrar el registro ". $e -> getMessage();
        }
        return $respon;

    }
    public function mldUpdateUsuario(){
        $sql = "CALL `spUpdateUser`(?, ?, ?, ? , ?);";


        try {
            $objcon = new Conexion();

            $stmt = $objcon -> getConect() -> prepare($sql); 
            $stmt -> bindParam(1, $this -> code,        PDO::PARAM_INT);
            $stmt -> bindParam(2, $this -> name,    PDO::PARAM_STR);
            $stmt -> bindParam(3, $this -> lastname,        PDO::PARAM_STR);
            $stmt -> bindParam(4, $this -> user,    PDO::PARAM_STR);
            $stmt -> bindParam(5, $this -> password,    PDO::PARAM_STR);
  
            
        } catch (PDOExepcion $e) {
            print "hubo un error en mostrar los datos ". $e -> getMessage();
    }
    }
}

    

?>