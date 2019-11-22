<?php

class Dijkstra
{

    var $visitado = array();
    var $distancia = array();
    var $No_anterior = array();
    var $no_inicio = null;
    var $mapa = array();
    var $distancia_infinita = 0;
    var $numero_de_nos = 0;
    var $melhor_caminho = 0;
    var $matrixWidth = 0;

    function Dijkstra(&$nossoMapa, $distancia_infinita)
    {
        $this->distancia_infinita = $distancia_infinita;
        $this->mapa = &$nossoMapa;
        $this->numero_de_nos = count($nossoMapa);
        $this->melhor_caminho = 0;
    }

    function EncontrarCaminhoCurto($de, $para)
    {
        $this->no_inicio = $de;
        for ($i = 0; $i < $this->numero_de_nos; $i++) {
            if ($i == $this->no_inicio) {
                $this->visitado[$i] = true;
                $this->distancia[$i] = 0;
            } else {
                $this->visitado[$i] = false;
                $this->distancia[$i] = isset($this->mapa[$this->no_inicio][$i])
                    ? $this->mapa[$this->no_inicio][$i]
                    : $this->distancia_infinita;
            }
            $this->No_anterior[$i] = $this->no_inicio;
        }

        $maxTentativa = $this->numero_de_nos;
        $tentativa = 0;
        while (in_array(false, $this->visitado, true) && $tentativa <= $maxTentativa) {
            $this->melhor_caminho = $this->EncontrarMelhorCaminho($this->distancia, array_keys($this->visitado, false, true));
            if ($para !== null && $this->melhor_caminho === $para) {
                break;
            }
            $this->atualizar_distancia($this->melhor_caminho);
            $this->visitado[$this->melhor_caminho] = true;
            $tentativa++;
        }
    }

    function EncontrarMelhorCaminho($ourDistance, $ourNodesLeft)
    {
        $melhor_caminho = $this->distancia_infinita;
        $melhor_no = 0;
        for ($i = 0, $m = count($ourNodesLeft); $i < $m; $i++) {
            if ($ourDistance[$ourNodesLeft[$i]] < $melhor_caminho) {
                $melhor_caminho = $ourDistance[$ourNodesLeft[$i]];
                $melhor_no = $ourNodesLeft[$i];
            }
        }
        return $melhor_no;
    }

    function atualizar_distancia($obp)
    {
        for ($i = 0; $i < $this->numero_de_nos; $i++) {
            if ((isset($this->mapa[$obp][$i]))
                && (!($this->mapa[$obp][$i] == $this->distancia_infinita) || ($this->mapa[$obp][$i] == 0))
                && (($this->distancia[$obp] + $this->mapa[$obp][$i]) < $this->distancia[$i])
            ) {
                $this->distancia[$i] = $this->distancia[$obp] + $this->mapa[$obp][$i];
                $this->No_anterior[$i] = $obp;
            }
        }
    }

    function printMap(&$mapa)
    {
        $placeholder = ' %' . strlen($this->distancia_infinita) . 'd';
        $foo = '';
        for ($i = 0, $im = count($mapa); $i < $im; $i++) {
            for ($k = 0, $m = $im; $k < $m; $k++) {
                $foo .= sprintf($placeholder, isset($mapa[$i][$k]) ? $mapa[$i][$k] : $this->distancia_infinita);
            }
            $foo .= "\n";
        }
        return $foo;
    }

    function PuxarResultado($para)
    {
        $ourShortestPath = array();
        $foo = '';
        for ($i = 0; $i < $this->numero_de_nos; $i++) {
            if ($para !== null && $para !== $i) {
                continue;
            }
            $ourShortestPath[$i] = array();
            $endNode = null;
            $currNode = $i;
            $ourShortestPath[$i][] = $i;
            while ($endNode === null || $endNode != $this->no_inicio) {
                $ourShortestPath[$i][] = $this->No_anterior[$currNode];
                $endNode = $this->No_anterior[$currNode];
                $currNode = $this->No_anterior[$currNode];
            }
            $ourShortestPath[$i] = array_reverse($ourShortestPath[$i]);
            if ($para === null || $para === $i) {
                if ($this->distancia[$i] >= $this->distancia_infinita) {
                    $foo .= sprintf("Não a Rota entre (%d) e %d \n", $this->startnode, $i);
                } else {
                    $cidade_ida = $this->no_inicio;
                    $cidade_volta = $i;
                    $discancia = $this->distancia[$i];
                    $cidade_percorrida = count($ourShortestPath[$i]);
                    $lista = implode(' ', $ourShortestPath[$i]);

                    $foo = array("dados" => array("km" => $discancia,
                        "caminho" => $cidade_percorrida,
                        "lista" => $lista));
                }
            }
        }
        return $foo;
    }
} // end class
