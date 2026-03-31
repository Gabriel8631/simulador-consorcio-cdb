<?php

class SimuladorCDB
{
    /**
     * Gera um array simulando a evolução de um investimento em CDB.
     *
     * @param float $aporteMensal
     * @param float $taxaAnual Ex: 0.105 para 10.5%
     * @param int $meses
     * @return array
     */
    public static function calcularComAportes(float $aporteMensal, float $taxaAnual, int $meses): array
    {
        // Converte a taxa anual para taxa mensal equivalente
        $taxaMensal = pow(1 + $taxaAnual, 1 / 12) - 1;

        $dados = [];
        $saldoAtual = 0.0;
        $totalInvestido = 0.0;

        for ($mes = 1; $mes <= $meses; $mes++) {
            $saldoAtual += $aporteMensal;
            $totalInvestido += $aporteMensal;

            $rendimento = $saldoAtual * $taxaMensal;
            $saldoAtual += $rendimento;

            $dados[] = [
                "mes" => $mes,
                "aporte_mensal" => round($aporteMensal, 2),
                "total_investido" => round($totalInvestido, 2),
                "rendimento_mes" => round($rendimento, 2),
                "patrimonio_acumulado" => round($saldoAtual, 2)
            ];
        }

        return $dados;
    }
}
