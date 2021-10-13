<?php


namespace App\Entity;


class Parede
{

    /**
     * @var
     * @Assert\Type(type="float", message="must be a numeric value")
     */
    private $largura;
    /**
     * @var
     * @Assert\Type(type="float", message="must be a numeric value")
     */
    private $altura;
    private $janelas;
    private $portas;
    private $nome;

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
        $this->largura = floatval($largura);
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
        $this->altura = floatval($altura);
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

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }


}