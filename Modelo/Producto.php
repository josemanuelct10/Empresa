<?php
include_once "Proveedor.php";

class Producto {
    private string $codigo;
    private string $descripcion;
    private float $precio;
    private int $stock;
    private Proveedor $proveedor;

    // Constructor de la clase
    public function __construct(string $codigo, string $descripcion, float $precio, int $stock, Proveedor $proveedor) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->proveedor = $proveedor;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     */
    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio(float $precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get the value of stock
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock(int $stock)
    {
        $this->stock = $stock;
    }

    /**
     * Get the value of proveedor
     */
    public function getProveedor(): Proveedor
    {
        return $this->proveedor;
    }

    /**
     * Set the value of proveedor
     */
    public function setProveedor(Proveedor $proveedor)
    {
        $this->proveedor = $proveedor;
    }
}
?>
