<?php

class Proveedor {
    private string $codigo;
    private string $pwd;
    private string $telefono;
    private string $email;
    private string $direccion;
    private $misProductos;

    // Constructor de la clase
    public function __construct(string $codigo, string $pwd, string $telefono, string $email, string $direccion) {
        $this->codigo = $codigo;
        $this->pwd = $pwd;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->misProductos = array();
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
     * Get the value of pwd
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     */
    public function setPwd(string $pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     */
    public function setDireccion(string $direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get the value of misProductos
     */
    public function getMisProductos()
    {
        return $this->misProductos;
    }

    /**
     * Set the value of misProductos
     */
    public function setMisProductos($misProductos)
    {
        $this->misProductos = $misProductos;
    }
}

?>
