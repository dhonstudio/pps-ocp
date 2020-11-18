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
        $this->Cell(0,10,'',0,0,'C');
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
$pdf->Cell(30,10,'POLICY ISSUE ANALYSIS PAPER (PIAP)',0,0,'C');
$pdf->Ln(0);

$pdf->SetFont('Arial','',12);

$pdf->Cell(65);
$pdf->Cell(5,20,'Nomor',0,1,'C');
$pdf->Cell(90);
$pdf->Cell(20,-20,': PIAP-'.$id,0,1,'C');

$pdf->Cell(65);
$pdf->Cell(8,30,'Tanggal',0,1,'C');
$pdf->Cell(100);
$pdf->Cell(23,-30,': '.date('d F Y', $piap['stamp']),0,1,'C');

$pdf->Ln(20);

$pdf->Ln(12);

$pdf->Cell(0,0,'1.   Isu Kebijakan');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['pokok'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'2.   Latar Belakang');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['latar'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'3.   Dasar Hukum');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['dasar'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'4.   Obyek Isu Kebijakan');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['obyek_isu'];
$nb=$pdf->WordWrap($text,120);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'5.   Analisis');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['analisis'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(60);
$pdf->Cell(0,0,'a. Legal');

$pdf->Cell(-100);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['legal'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'b. Filosofi');

$pdf->Cell(-100);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['filosofi'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'c. Operasional');

$pdf->Cell(-100);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['operasional'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'d. SosEk');

$pdf->Cell(-100);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['sosek'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'e. Lainnya');

$pdf->Cell(-100);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['lainnya'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'6.   Dampak');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = 'KINERJA : '. $piap['kinerja'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(60);
$pdf->Cell(0,0,'a. Penerimaan');

$pdf->Cell(-99);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['penerimaan'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'b. Pelayanan');

$pdf->Cell(-99);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['pelayanan'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'c. Fasilitasi');

$pdf->Cell(-99);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['fasilitasi'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'d. Pengawasan');

$pdf->Cell(-99);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['pengawasan'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(3);

$pdf->Cell(60);
$pdf->Cell(0,0,'e. Kelembagaan');

$pdf->Cell(-99);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(93);
$text = $piap['kelembagaan'];
$nb=$pdf->WordWrap($text,95);
$pdf->MultiCell(120,5,$text);

$pdf->Ln(5);

$pdf->Cell(60);
$text = 'CITRA : '. $piap['citra'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'7.   Rekomendasi');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['usulan'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Ln(5);

$pdf->Cell(0.1);
$pdf->Cell(0,0,'8.   Unit Terkait');

$pdf->Cell(-133);
$pdf->Cell(0,0,':');

$pdf->Ln(-2.5);

$pdf->Cell(60);
$text = $piap['unit'];
$nb=$pdf->WordWrap($text,125);
$pdf->MultiCell(125,5,$text);

$pdf->Output();