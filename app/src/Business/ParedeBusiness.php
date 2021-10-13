<?php


namespace App\Business;


use App\Entity\Parede;

class ParedeBusiness
{
    const MIN_DIMENSAO_PAREDE = 1.0;
    const MAX_DIMENSAO_PAREDE = 15.0;

    const RELACAO_ENTRE_PAREDE_E_POTA = 0.3;

    const ALTURA_JANELA = 2.0;
    const LARGURA_JANELA = 1.2;

    const ALTURA_PORTA = 0.8;
    const LARGURA_PORTA = 1.9;


    public function validaDimensoesParede(Parede $parede)
    {
        return $parede->getArea() >= self::MIN_DIMENSAO_PAREDE && $parede->getArea() <= self::MAX_DIMENSAO_PAREDE;
    }

    public function validaAlturaDaPortaEmRelacaoAParede(Parede $parede)
    {
        return $parede->getAltura() >= self::ALTURA_PORTA + self::RELACAO_ENTRE_PAREDE_E_POTA;
    }

    public function areaTotalJanelas(Parede $parede)
    {
        return floatval($parede->getJanelas()) * self::ALTURA_JANELA * self::LARGURA_JANELA;
    }

    public function areaTotalPortas(Parede $parede)
    {
        return floatval($parede->getPortas()) * self::ALTURA_PORTA * self::LARGURA_PORTA;
    }

    public function isAreaJanelaPortasMetadeAreaParede(Parede $parede)
    {
        $area = (($this->areaTotalJanelas($parede) + $this->areaTotalPortas($parede)) / $parede->getArea()) * 100;
        return $area > 50;
    }

    public function calcularAreaParaPintar(Parede $parede)
    {
        return $parede->getArea() - ($this->areaTotalPortas($parede) + $this->areaTotalJanelas($parede));
    }

    public function validaRegras(Parede $parede)
    {
        $erros = [];
        $nome = $parede->getNome();

        if (!$this->validaDimensoesParede($parede)) {
            $erros[] = "A dimensão da ${nome} precisa estar ente 1 e 15 m2";
        }
        if (!$this->validaAlturaDaPortaEmRelacaoAParede($parede)) {
            $erros[] = "A altura da porta da ${nome} tem que ser no minimo 30cm menor que a altura da parede";
        }
        if ($this->isAreaJanelaPortasMetadeAreaParede($parede)) {
            $erros[] = "A área total das portas e janelas na ${nome} tem que ser 50% menor que a área da parede";
        }

        return $erros;
    }

    public function getLitrosNecessarios($area)
    {
        return $area / 5;
    }

    public function calcularAreaTotalDasParedes($paredesCollection){
        $total = 0;
        foreach ($paredesCollection as $parede) {
            $total += $this->calcularAreaParaPintar($parede);
        }
        return $total;
    }
    public function calculaQuantidadeDeLatasNecessarias($areaTotalDasParedes)
    {
        $litrosNecessarios = $this->getLitrosNecessarios($areaTotalDasParedes);
        return array(
            ['lata' => '0.5 Litros',
                'quantidade' => ceil($litrosNecessarios / 0.5)
            ],
            ['lata' => '2.5 Litros',
                'quantidade' => ceil($litrosNecessarios / 2.5)
            ],
            ['lata' => '3.6 Litros',
                'quantidade' => ceil($litrosNecessarios / 3.6)
            ],
            ['lata' => '18 Litros',
                'quantidade' => ceil($litrosNecessarios / 18) < 1.0  ? '1' : ceil($litrosNecessarios / 18)
            ],
        );
    }
}