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
            $this->judul('PEMERINTAH PROVINSI KEPULAUAN RIAU', 'BADAN PENANGGULANGAN BENCANA DAERAH', 'Jalan Tugu Pahlawan Nomor 18, Telepon (0771) 315977, Fax. (0771) 316977', 'Website: bpbd.kepriprov.go.id', 'TANJUNGPINANG');
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
            $this->Cell(300, 20, 'Lingga, ' . $this->format_ind(date('Y-m-d')), 0, 1, 'C');
            $this->Ln(10);
            $this->Cell(300, 10, 'Bpk.Pimpinan', 0, 1, 'C');
            $this->Cell(300, 0, '(Kepala BPBD Lingga)', 0, 1, 'C');
        }
    }
}
