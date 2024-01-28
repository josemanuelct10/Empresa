<?php
    include_once "Producto.php";
    include_once "Proveedor.php";

    class ProductoBD{
        /**
         * Recibe un objeto de producto y un producto de proveedor
         * Devuelve un booleano: false -> si no se ha podido añadir el producto true -> si el producto se ha añadido correctamente
         */
        public static function add(Producto $producto, Proveedor $proveedor): bool{
            include_once "../Conexion/conexion.php";
            $result = false;

            $codigoProveedor = $proveedor->getCodigo();

            $conexion = Conexion::obtenerConexion();

            $sql = "INSERT INTO productos (codigo, descripcion, precio, stock, codigo_proveedor) VALUES (:codigo, :descripcion, :precio, :stock, :codigo_proveedor)";

            $sentencia = $conexion -> prepare($sql);

            $sentencia->bindValue(':codigo',$producto->getCodigo());
            $sentencia->bindValue(':descripcion',$producto->getDescripcion());
            $sentencia->bindValue(':precio',$producto->getPrecio());
            $sentencia->bindValue(':stock',$producto->getStock());
            $sentencia->bindValue(':codigo_proveedor',$codigoProveedor);

            $result = $sentencia->execute();

            return $result;
        }

        /**
         * Recibe un objeto de proveedor
         * Devuelve un array de productos que pertenecen al proveedor o false si hay algun error en la consulta
         */
        public static function getByProveedor(Proveedor $proveedor) {
            include_once "../Conexion/conexion.php";
        
            $codigoProveedor = $proveedor->getCodigo();
            
            $conexion = Conexion::obtenerConexion();
        
            $sql = "SELECT * FROM Productos WHERE codigo_proveedor = :codigoProveedor";
        
            $sentencia = $conexion->prepare($sql);
        
            $sentencia->bindParam(':codigoProveedor', $codigoProveedor);
        
            $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        
            $result = $sentencia->execute();
        
            $productos = array();
        
            while($productoBD = $sentencia->fetch()){
                $proveedor = ProveedorBD::getMin($productoBD['codigo_proveedor']);
                $producto = new Producto($productoBD['codigo'], $productoBD['descripcion'], $productoBD['precio'], $productoBD['stock'], $proveedor);
                $productos[] = $producto; 
            }
        
            return $productos; 
        }
        
        /**
         * Recibe un objeto de proveedor y una descripcion
         * Devuelve un array de productos que pertenezcan al proveedor y que concuerde con la descripcion o false si ha habido algun error en la consulta
         */
        public static function getByDescripcion(Proveedor $proveedor, $descripcion){
            include_once "../Conexion/conexion.php";

            $codigoProveedor = $proveedor->getCodigo();

            $conexion = Conexion::obtenerConexion();

            $sql = "SELECT * FROM Productos WHERE descripcion = :descripcion AND codigo_proveedor = :codigoProveedor";

            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->bindParam(':codigoProveedor', $codigoProveedor);

            $sentencia->setFetchMode(PDO::FETCH_ASSOC);

            $result = $sentencia->execute();

            $productos = array();

            while ($productoBD = $sentencia->fetch()){
                $proveedor = ProveedorBD::getMin($productoBD['codigo_proveedor']);
                $producto = new Producto($productoBD['codigo'], $productoBD['descripcion'], $productoBD['precio'], $productoBD['stock'], $proveedor);
                $productos[] = $producto;
            }

            return $productos;
        }
        
        /**
         * Recibe un objeto de proveedor y un stock
         * Devuelve un array de productos que pertenezcan al proveedor y el stock sea mayor al stock del producto o false si ha habido algun error en la consulta
         */
        public static function getByStock(Proveedor $proveedor, $stock){
            include_once "../Conexion/conexion.php";
            $codigoProveedor = $proveedor->getCodigo();

            $conexion = Conexion::obtenerConexion();

            $sql = "SELECT * FROM productos WHERE stock < :stock AND codigo_proveedor = :codigoProveedor";

            $sentencia = $conexion->prepare($sql);

            $sentencia->bindParam(':stock', $stock);

            $sentencia->bindParam(':codigoProveedor',$codigoProveedor);

            $sentencia->setFetchMode(PDO::FETCH_ASSOC);

            $result = $sentencia->execute();

            $productos = array();

            while ($productoBD = $sentencia->fetch()){
                $proveedor = ProveedorBD::getMin($productoBD['codigo_proveedor']);
                $producto = new Producto($productoBD['codigo'], $productoBD['descripcion'], $productoBD['precio'], $productoBD['stock'], $proveedor);
                $productos[] = $producto;
            }

            return $productos;
        }

        /**
         * Recibe un objeto de proveedor y un objeto de producto
         * Devuelve true-> si la consulta se ha realizado correctamente false-> si la consulta no ha salido bien
         */
        public static function update(Producto $producto, Proveedor $proveedor){
            include_once "../Conexion/conexion.php";
        
            $conexion = Conexion::obtenerConexion();
        
            $codigoProveedor = $proveedor->getCodigo();
            $codigoProducto = $producto->getCodigo(); 
        
            $descripcion = $producto->getDescripcion();
            $precio = $producto->getPrecio();
            $stock = $producto->getStock();
        
            $sql = "UPDATE Productos
                SET descripcion = :descripcion, 
                    precio = :precio, 
                    stock = :stock
                WHERE codigo = :codigoProducto AND codigo_proveedor = :codigoProveedor";
        
            $sentencia = $conexion->prepare($sql);
        
            $sentencia->bindParam(":descripcion", $descripcion);
            $sentencia->bindParam(":precio", $precio);
            $sentencia->bindParam(":stock", $stock);
            $sentencia->bindParam(":codigoProducto", $codigoProducto);
            $sentencia->bindParam(":codigoProveedor", $codigoProveedor);
        
            $result = $sentencia->execute();
        
            return $result;
        }
        
        /**
         * Recibe un codigo de proveedor
         * Devuelve true-> si la consulta se ha realizado correctamente false-> si la consulta no ha salido bien
         */
        public static function delete($codigo){
            include_once "../Conexion/conexion.php";

            $conexion = Conexion::obtenerConexion();

            $sql = "DELETE FROM productos WHERE codigo = :codigoProducto";

            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(":codigoProducto", $codigo);

            $result = $sentencia->execute();

            return $result;
        }
    }

?>
