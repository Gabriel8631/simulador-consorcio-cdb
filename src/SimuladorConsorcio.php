<?php

class SimuladorConsorcio
{
    /**
     * Gera um array simulando as parcelas de um consórcio.
     *
     * @param float $cartaCredito Valor da carta
     * @param float $taxaAdminTotal Ex: 0.20 para 20% em todo o período
     * @param int $meses Prazo do consórcio
     * @return array
     */
    public static function calcularParcelas(float $cartaCredito, float $taxaAdminTotal, int $meses): array
    {
        // Calcula o custo total do consórcio
        $valorTotal = $cartaCredito * (1 + $taxaAdminTotal);
        $parcelaMensal = $valorTotal / $meses;

        $dados = [];
        $totalPago = 0.0;

        for ($mes = 1; $mes <= $meses; $mes++) {
            $totalPago += $parcelaMensal;

            $dados[] = [
                "mes" => $mes,
                "parcela_mensal" => round($parcelaMensal, 2),
                "total_pago" => round($totalPago, 2)
            ];
        }

        return $dados;
    }
}
