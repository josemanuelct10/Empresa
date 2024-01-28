<?php
    include_once "Proveedor.php";
    include_once "ProductoBD.php";
    class ProveedorBD{
        /**
         * Recibe un objeto de proveedor
         * Devuelve true-> si se ha insertado correctamente false-> si ha ocurrido algun error
         */
        public static function add(Proveedor $proveedor){
            include_once "../Conexion/conexion.php";

            $conexion = Conexion::obtenerConexion();

            $sql = "INSERT INTO proveedor (codigo, pwd, telefono, email, direccion) VALUES (:codigo, :pwd, :telefono, :email, :direccion)";

            $sentencia = $conexion -> prepare($sql);
            
            $sentencia->bindValue(':codigo',$proveedor->getCodigo());
            $sentencia->bindValue(':pwd', password_hash($proveedor->getPwd(), PASSWORD_DEFAULT));
            $sentencia->bindValue(':telefono',$proveedor->getTelefono());
            $sentencia->bindValue(':email',$proveedor->getEmail());
            $sentencia->bindValue(':direccion',$proveedor->getDireccion());

            $result = $sentencia->execute();

            return $result;
        }

        /**
         * Recibe un codigo de proveedor
         * Devuelve un proveedor con el array de este proveedor en nulo o false si el proveedor no se ha encontrado
         */
        public static function getMin($codigoProveedor)
        {
            $result = false;
        
            include_once "../Conexion/conexion.php";
        
            $conexion = Conexion::obtenerConexion();
        
            $sql = "SELECT * FROM proveedor WHERE codigo = :codigoProveedor";
        
            $sentencia = $conexion->prepare($sql);
        
            $sentencia->bindValue(":codigoProveedor", $codigoProveedor);
        
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        
            $sentencia->execute();

            if ($datosProveedor = $sentencia->fetch()) {
                $proveedor = new Proveedor($datosProveedor['codigo'], $datosProveedor['pwd'], $datosProveedor['telefono'], $datosProveedor['email'], $datosProveedor['direccion']);
                $proveedor->setMisProductos(null);
                return $proveedor;
        
            }
            else return $result;
        
        }
        
        

        /**
         * Recibe un proveedor
         * Devuelve true-> si se ha actualizado correctamente false-> si ha ocurrido algún error
         */
        public static function update(Proveedor $proveedor) {
            $result = false;
        
            include_once "../Conexion/conexion.php";
        
            $conexion = Conexion::obtenerConexion();
        
            $sql = "UPDATE proveedor 
                    SET 
                        telefono = :telefono,
                        email = :email,
                        direccion = :direccion
                    WHERE codigo = :codigo";
        
            $sentencia = $conexion->prepare($sql);
        
            $sentencia->bindValue(':codigo', $proveedor->getCodigo());
            $sentencia->bindValue(':telefono',$proveedor->getTelefono());
            $sentencia->bindValue(':email',$proveedor->getEmail());
            $sentencia->bindValue(':direccion',$proveedor->getDireccion());        
            $result = $sentencia->execute();
        
            return $result;
        }

        /**
         * Recibe un objeto proveedor
         * Devuelve un proveedor ya con la lista de productos completa
         */

        public static function getMax(Proveedor $proveedor) {
            $proveedor = self::getMin($proveedor->getCodigo());
    
            if ($proveedor) {
                $productos = ProductoBD::getByProveedor($proveedor);
                $proveedor->setMisProductos($productos);
            }
    
            return $proveedor;
        }
        

        /**
         * Recibe un codigo de proveedor y la pwd nueva
         * Devuelve true-> si se ha actualizado correctamente false-> si no se ha actualizado correctamente
         */
        public static function updatePassword($codigo, $pwdNueva) {
            include_once "../Conexion/conexion.php";
    
            $conexion = Conexion::obtenerConexion();
    
            $sql = "UPDATE proveedor SET pwd = :pwdNueva WHERE codigo = :codigo";
    
            $sentencia = $conexion->prepare($sql);
    
            $sentencia->bindParam(':pwdNueva', $pwdNueva);
            $sentencia->bindParam(':codigo', $codigo);
    
            return $sentencia->execute();
        }
        

    }
?>