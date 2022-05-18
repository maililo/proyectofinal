        <?php
        require_once "../../controller/user.controller.php";
        require_once "../../model/dao/user.dao.php";
        require_once "../../model/dto/user.dto.php";
        require_once "../../model/conexion.php";
        class Reporte{

            private $pdf;

            public function __construct(){
        
                include 'vendor/fpdf.php';
                $this -> pdf = new FPDF();
                $this -> pdf->AddPage();
            }
            public function headReport(){
                // Logo
            $this -> pdf->Image('../img/732217.png',10,8,33);
            // Arial bold 15
            $this -> pdf->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this -> pdf->Cell(80);
            // Título
            $this -> pdf->Cell(30,10,'Title',1,0,'C');
            // Salto de línea
            $this -> pdf ->Ln(20);
            }
            
            public function viewALL(){

        
            $this -> pdf->SetFont('Arial','B',16);


                try {
                    $objDtoUser = new User();
                    $objDaoUser = new UserModel($objDtoUser);
                    $respon = $objDaoUser -> mldSearchAllUser() -> fetchAll();
                } catch (PDOExeption $e) {
                    print "there was a mistake on the creation of the display controller ". $e ->getMesagge();
                }
            
            

            $fila=10;

            foreach($respon as $key => $value){

                $this -> pdf->Cell($fila,40,$value['CODE']);
                $this -> pdf->Cell($fila,40,$value['USER']);
                //$this -> pdf->Cell($fila,40,$value['NAME']);
                //$this -> pdf->Cell($fila,40,$value['LASTNAME']);
                $this -> pdf ->ln(10); 

            }
            
        }
        public function footReport(){
             // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
             $this->SetFont('Arial','I',8);
             // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        $this -> pdf->Output();
        }
        
    
        $objeview = new Reporte ;
        $objeview -> headReport();
        $objeview -> viewALL();
        ?>