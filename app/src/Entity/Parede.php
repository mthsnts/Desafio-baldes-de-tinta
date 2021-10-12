<?php


namespace Entity;


class Parede
{

    private $largura;
    private $altura;
    private $area;
    private $janelas;
    private $portas;

    /**
     * @return mixed
     */
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * @param mixed $largura
     */
    public function setLargura($largura)
    {
        $this->largura = $largura;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @return mixed
     */
    public function getJanelas()
    {
        return $this->janelas;
    }

    /**
     * @param mixed $janelas
     */
    public function setJanelas($janelas)
    {
        $this->janelas = $janelas;
    }

    /**
     * @return mixed
     */
    public function getPortas()
    {
        return $this->portas;
    }

    /**
     * @param mixed $portas
     */
    public function setPortas($portas)
    {
        $this->portas = $portas;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->getAltura() * $this->getLargura();
    }

}