<?php
    include_once "Producto.php";
    include_once "Proveedor.php";

    class ProductoBD{
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

        // Editarlo
        public static function update (Producto $producto, Proveedor $proveedor){
            include_once "../Conexion/conexion.php";

            $codigoProveedor -> $proveedor->getCodigo();
            $conexion = Conexion::obtenerConexion();

            $sql = "UPDATE Producto 
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
