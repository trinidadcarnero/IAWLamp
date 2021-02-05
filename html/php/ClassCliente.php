<?php



    class Cliente {
        //Estado
        private $nombre;
        private $apellidos;
        private $dni;
        private $email;
        private $fecha_nacimiento;

        function __construct($nombre, $apellidos, $dni, $email, $fecha_nacimiento) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->dni = $dni;
            $this->email = $email;
            $this->fecha_nacimiento = $fecha_nacimiento;
        }



        //Darse de alta
        function darAlta($conn) {
           //$sql = "INSERT INTO clientes (nombre, apellidos, dni, email, fecha_nacimiento) VALUES ('".$this->nombre."','".$this->apellidos."','".$this->dni."','".$this->email."','".$this->fecha_nacimiento."');";
           $sql = "INSERT INTO clientes (nombre, apellidos, dni, email, fecha_nacimiento) VALUES ('$this->nombre','$this->apellidos','$this->dni','$this->email','$this->fecha_nacimiento');";

            if ($conn->query($sql) === TRUE) {

                //hago la construccion del email y lo mando
                echo "Producto insertado correctamente y notificado por email al Administrador";


            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
?>
