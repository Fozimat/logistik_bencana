<?php

namespace App\ThirdParty;

use App\ThirdParty\FPDF;

class PDF extends FPDF
{
    function Header()
    {
        if ($this->PageNo() == 1) {
            $this->Image(APPPATH . 'ThirdParty/img/lingga.png', 10, 5, 35, 30, 'PNG');
            $this->Image(APPPATH . 'ThirdParty/img/kepri.png', 173, 4, 30, 30, 'PNG');
            $this->judul('PEMERINTAH KABUPATEN LINGGA', 'BADAN PENANGGULANGAN BENCANA DAERAH', 'Jalan ISTANA KOTA BARU (KOMPLEK PERKANTORAN PEMKAB)', 'e-mail: bpbdkab.lingga@gmail.com', 'DAIK - LINGGA');
            $this->garis();
        }
    }

    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 37, 205, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 38, 205, 37);
    }

    function judul($teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $this->Cell(10);
        $this->SetFont('Times', '', '14');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(10);
        $this->SetFont('Times', 'B', '14');
        $this->Cell(0, 5, $teks2, 0, 1, 'C');
        $this->Cell(10);
        $this->SetFont('Times', '', '10');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(10);
        $this->SetFont('Times', '', '9');
        $this->Cell(0, 4, $teks4, 0, 1, 'C');
        $this->Cell(10);
        $this->SetFont('Times', 'b', '12');
        $this->Cell(0, 5, $teks5, 0, 1, 'C');
    }

    function format_ind($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    function Footer()
    {
        if ($this->isFinished) {
            $this->Cell(300, 20, 'Daik Lingga, ' . $this->format_ind(date('Y-m-d')), 0, 1, 'C');
            $this->Ln(10);
            $this->SetFont('Times', 'B', '12');
            $this->Cell(300, 10, 'SAID YARDIANSYAH,S.E', 0, 1, 'C');
            $this->SetFont('Times', '', '11');
            $this->Cell(300, 0, '(Kepala Seksi Kedaruratan dan Logistik)', 0, 1, 'C');
        }
    }

    function InlineImage($file, $x = null, $y = null, $w = 0, $h = 0, $type = '', $link = '')
    {
        // ----- Code from FPDF->Image() -----
        // Put an image on the page
        if ($file == '')
            $this->Error('Image file name is empty');
        if (!isset($this->images[$file])) {
            // First use of this image, get info
            if ($type == '') {
                $pos = strrpos($file, '.');
                if (!$pos)
                    $this->Error('Image file has no extension and no type was specified: ' . $file);
                $type = substr($file, $pos + 1);
            }
            $type = strtolower($type);
            if ($type == 'jpeg')
                $type = 'jpg';
            $mtd = '_parse' . $type;
            if (!method_exists($this, $mtd))
                $this->Error('Unsupported image type: ' . $type);
            $info = $this->$mtd($file);
            $info['i'] = count($this->images) + 1;
            $this->images[$file] = $info;
        } else
            $info = $this->images[$file];

        // Automatic width and height calculation if needed
        if ($w == 0 && $h == 0) {
            // Put image at 96 dpi
            $w = -96;
            $h = -96;
        }
        if ($w < 0)
            $w = -$info['w'] * 72 / $w / $this->k;
        if ($h < 0)
            $h = -$info['h'] * 72 / $h / $this->k;
        if ($w == 0)
            $w = $h * $info['w'] / $info['h'];
        if ($h == 0)
            $h = $w * $info['h'] / $info['w'];

        // Flowing mode
        if ($y === null) {
            if ($this->y + $h > $this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak()) {
                // Automatic page break
                $x2 = $this->x;
                $this->AddPage($this->CurOrientation, $this->CurPageSize, $this->CurRotation);
                $this->x = $x2;
            }
            $y = $this->y;
            $this->y += $h;
        }

        if ($x === null)
            $x = $this->x;
        $this->_out(sprintf('q %.2F 0 0 %.2F %.2F %.2F cm /I%d Do Q', $w * $this->k, $h * $this->k, $x * $this->k, ($this->h - ($y + $h)) * $this->k, $info['i']));
        if ($link)
            $this->Link($x, $y, $w, $h, $link);
        # -----------------------

        // Update Y
        $this->y += $h;
    }
}
