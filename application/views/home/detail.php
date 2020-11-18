<?php
include(APPPATH.'core/fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
                
    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'IKS ini telah ditandatangani secara digital oleh Kepala Kantor',0,0,'C');
    }

    function WordWrap(&$text, $maxwidth)
    {
        $text = trim($text);
        if ($text==='')
            return 0;
        $space = $this->GetStringWidth(' ');
        $lines = explode("\n", $text);
        $text = '';
        $count = 0;

        foreach ($lines as $line)
        {
            $words = preg_split('/ +/', $line);
            $width = 0;

            foreach ($words as $word)
            {
                $wordwidth = $this->GetStringWidth($word);
                if ($wordwidth > $maxwidth)
                {
                    for($i=0; $i<strlen($word); $i++)
                    {
                        $wordwidth = $this->GetStringWidth(substr($word, $i, 1));
                        if($width + $wordwidth <= $maxwidth)
                        {
                            $width += $wordwidth;
                            $text .= substr($word, $i, 1);
                        }
                        else
                        {
                            $width = $wordwidth;
                            $text = rtrim($text)."\n".substr($word, $i, 1);
                            $count++;
                        }
                    }
                }
                elseif($width + $wordwidth <= $maxwidth)
                {
                    $width += $wordwidth + $space;
                    $text .= $word.' ';
                }
                else
                {
                    $width = $wordwidth + $space;
                    $text = rtrim($text)."\n".$word.' ';
                    $count++;
                }
            }
            $text = rtrim($text)."\n";
            $count++;
        }
        $text = rtrim($text);
        return $count;
    }
}


$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial','BIU',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'CRITICAL ISSUE PAPER (CIP)',0,0,'C');
$pdf->Ln(0);

$pdf->SetFont('Arial','',12);

$pdf->Cell(75);
$pdf->Cell(5,20,'Nomor',0,1,'C');
$pdf->Cell(90);
$pdf->Cell(20,-20,': CIP-'.$id,0,1,'C');

$pdf->Cell(75);
$pdf->Cell(8,30,'Tanggal',0,1,'C');
$pdf->Cell(100);
$pdf->Cell(25,-30,': '.date('d F Y', $iks['stamp']),0,1,'C');

$pdf->Ln(20);

$pdf->Cell(0.1);
$pdf->Cell(0,10,'1.   ISU KEBIJAKAN');
//$pdf->Cell(40,15,'1.    ISU KEBIJAKAN',0,1,'C');

$pdf->Ln(12);

$pdf->Cell(7);
$pdf->Cell(0,0,'a. Pokok Isu Kritis');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['pokok'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(7);
$pdf->Cell(0,0,'b. Sumber Isu');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['sumber'];
$nb=$pdf->WordWrap($text,120);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'2.   LOKASI');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['kantor'];
$nb=$pdf->WordWrap($text,120);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'3.   LATAR BELAKANG');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['latar'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'4.   DASAR HUKUM');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['dasar'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'5.   URAIAN MASALAH');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['uraian'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'6.   ANALISIS PERMASALAHAN');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['analisis'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'7.   DAMPAK/POTENSI');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['dampak'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'8.   USULAN');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['usulan'];
$nb=$pdf->WordWrap($text,110);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'9.   LAMPIRAN');

$pdf->Cell(-123);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(70);
$text = $iks['lampiran'].' lembar';
$nb=$pdf->WordWrap($text,120);
$pdf->MultiCell(120,5,$text);

$pdf->Output();