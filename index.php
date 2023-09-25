<?php

/**
 * Script para ler um arquivo PDF, escrever um texto em uma posição fixa
 * da página e colocar uma imagem por cima do documento.
 * Após isso ele apresenta o resultado em tela.
 */

use setasign\Fpdi\Fpdi;

require_once('vendor/autoload.php');

$pdf = new Fpdi();
//$pdf->AddPage();
$numPages = $pdf->setSourceFile("livro.pdf");

//$tplId = $pdf->importPage(1);
//$novoPdf = new Fpdi();

for ($i = 1; $i < $numPages; $i++) {
    $page = $pdf->importPage($i);

    $pdf->AddPage();
    $pdf->useTemplate($page);

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(65, 70);
    $pdf->Write(0, "800.999-765/90.6");

    $pdf->Image('controladagrande.png', 1, 1);
}

$pdf->Output();
