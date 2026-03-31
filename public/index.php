<?php

// Importa as classes de simulação
require_once __DIR__ . '/../src/SimuladorCDB.php';
require_once __DIR__ . '/../src/SimuladorConsorcio.php';

// --- Cenário de Teste ---
$prazoMeses = 36;
$aporteCDB = 1500.00;
$taxaCDBAnual = 0.105; // 10.5% ao ano

$cartaConsorcio = 50000.00;
$taxaAdminConsorcio = 0.15; // 15% de taxa administrativa total

// Executa os cálculos
$resultadoCDB = SimuladorCDB::calcularComAportes($aporteCDB, $taxaCDBAnual, $prazoMeses);
$resultadoConsorcio = SimuladorConsorcio::calcularParcelas($cartaConsorcio, $taxaAdminConsorcio, $prazoMeses);

// --- Exibição dos Resultados (Terminal) ---
echo "========================================\n";
echo "   ANALISE: CDB vs CONSÓRCIO ($prazoMeses meses)   \n";
echo "========================================\n\n";

// Pega o último mês da simulação do CDB para ver o resultado final
$finalCDB = end($resultadoCDB);
echo "[ RESULTADO CDB ]\n";
echo "Total Investido: R$ " . number_format($finalCDB['total_investido'], 2, ',', '.') . "\n";
echo "Patrimônio Final: R$ " . number_format($finalCDB['patrimonio_acumulado'], 2, ',', '.') . "\n\n";

// Pega o último mês da simulação do Consórcio
$finalConsorcio = end($resultadoConsorcio);
$primeiraParcela = $resultadoConsorcio[0]['parcela_mensal'];
echo "[ RESULTADO CONSÓRCIO ]\n";
echo "Carta de Crédito: R$ " . number_format($cartaConsorcio, 2, ',', '.') . "\n";
echo "Valor da Parcela: R$ " . number_format($primeiraParcela, 2, ',', '.') . "\n";
echo "Custo Total Pago: R$ " . number_format($finalConsorcio['total_pago'], 2, ',', '.') . "\n";
echo "========================================\n";
