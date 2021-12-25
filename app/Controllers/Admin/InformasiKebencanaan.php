<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InformasiKebencanaanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InformasiKebencanaan extends BaseController
{
    public function __construct()
    {
        $this->informasiKebencanaanModel = new InformasiKebencanaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Informasi Kebencanaan',
            'informasi_kebencanaan' => $this->informasiKebencanaanModel->getInformasiKebencanaan()
        ];
        return view('informasi_kebencanaan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Informasi Kebencanaan',
            'validation' => \Config\Services::validation()
        ];
        return view('informasi_kebencanaan/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi/Tempat Kejadian tidak boleh kosong'
                    ]
                ],
                'tgl_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Bencana tidak boleh kosong'
                    ]
                ],
                'korban_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'korban_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'usia_0_5' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_6_20' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_21_60' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_61' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'ibu_hamil' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'meninggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'hilang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'luka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'mengungsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'jenis_prasarana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Prasarana tidak boleh kosong'
                    ]
                ],
                'rusak_ringan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_sedang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_berat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('admin/informasikebencanaan/create')->withInput();
        }
        $data = [
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'tgl_bencana' => $this->request->getVar('tgl_bencana'),
            'korban_laki' => $this->request->getVar('korban_laki'),
            'korban_perempuan' => $this->request->getVar('korban_perempuan'),
            'usia_0_5' => $this->request->getVar('usia_0_5'),
            'usia_6_20' => $this->request->getVar('usia_6_20'),
            'usia_21_60' => $this->request->getVar('usia_21_60'),
            'usia_61' => $this->request->getVar('usia_61'),
            'ibu_hamil' => $this->request->getVar('ibu_hamil'),
            'meninggal' => $this->request->getVar('meninggal'),
            'hilang' => $this->request->getVar('hilang'),
            'luka' => $this->request->getVar('luka'),
            'mengungsi' => $this->request->getVar('mengungsi'),
            'jenis_prasarana' => $this->request->getVar('jenis_prasarana'),
            'rusak_ringan' => $this->request->getVar('rusak_ringan'),
            'rusak_sedang' => $this->request->getVar('rusak_sedang'),
            'rusak_berat' => $this->request->getVar('rusak_berat'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->informasiKebencanaanModel->insertInformasiKebencanaan($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/informasikebencanaan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Informasi Kebencanaan',
            'validation' => \Config\Services::validation(),
            'informasi_kebencanaan' => $this->informasiKebencanaanModel->getInformasiKebencanaanById($id)
        ];
        return view('informasi_kebencanaan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi/Tempat Kejadian tidak boleh kosong'
                    ]
                ],
                'tgl_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Bencana tidak boleh kosong'
                    ]
                ],
                'korban_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'korban_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'usia_0_5' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_6_20' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_21_60' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'usia_61' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'ibu_hamil' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'meninggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'hilang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'luka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'mengungsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'jenis_prasarana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Prasarana tidak boleh kosong'
                    ]
                ],
                'rusak_ringan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_sedang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_berat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('admin/informasikebencanaan/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'tgl_bencana' => $this->request->getVar('tgl_bencana'),
            'korban_laki' => $this->request->getVar('korban_laki'),
            'korban_perempuan' => $this->request->getVar('korban_perempuan'),
            'usia_0_5' => $this->request->getVar('usia_0_5'),
            'usia_6_20' => $this->request->getVar('usia_6_20'),
            'usia_21_60' => $this->request->getVar('usia_21_60'),
            'usia_61' => $this->request->getVar('usia_61'),
            'ibu_hamil' => $this->request->getVar('ibu_hamil'),
            'meninggal' => $this->request->getVar('meninggal'),
            'hilang' => $this->request->getVar('hilang'),
            'luka' => $this->request->getVar('luka'),
            'mengungsi' => $this->request->getVar('mengungsi'),
            'jenis_prasarana' => $this->request->getVar('jenis_prasarana'),
            'rusak_ringan' => $this->request->getVar('rusak_ringan'),
            'rusak_sedang' => $this->request->getVar('rusak_sedang'),
            'rusak_berat' => $this->request->getVar('rusak_berat'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->informasiKebencanaanModel->updateInformasiKebencanaan($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/informasikebencanaan');
    }

    public function delete($id)
    {
        $this->informasiKebencanaanModel->deleteInformasiKebencanaan($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/informasikebencanaan');
    }

    public function downloadExcel()
    {
        $data = $this->informasiKebencanaanModel->getInformasiKebencanaan();

        $fileName = 'informasi-kebencanaan.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'JENIS BENCANA');
        $sheet->setCellValue('C1', 'LOKASI TEMPAT KEJADIAN');
        $sheet->setCellValue('D1', 'TANGGAL BENCANA');
        $sheet->setCellValue('E1', 'KORBAN LAKI');
        $sheet->setCellValue('F1', 'KORBAN PEREMPUAN');
        $sheet->setCellValue('G1', 'USIA 0 - 5 TAHUN');
        $sheet->setCellValue('H1', 'USIA 6 - 20 TAHUN');
        $sheet->setCellValue('I1', 'USIA 21 - 60 TAHUN');
        $sheet->setCellValue('J1', 'USIA 61 KE ATAS');
        $sheet->setCellValue('K1', 'IBU HAMIL');
        $sheet->setCellValue('L1', 'MENINGGAL');
        $sheet->setCellValue('M1', 'HILANG');
        $sheet->setCellValue('N1', 'LUKA');
        $sheet->setCellValue('O1', 'MENGUNGSI');
        $sheet->setCellValue('P1', 'JENIS PRASARANA');
        $sheet->setCellValue('Q1', 'RUSAK RINGAN');
        $sheet->setCellValue('R1', 'RUSAK SEDANG');
        $sheet->setCellValue('S1', 'RUSAK BERAT');
        $sheet->setCellValue('T1', 'KETERANGAN');

        $rows = 2;

        //menggabungkan data atribut kedalam cell excel
        for ($i = 'A'; $i !=  $spreadsheet->getActiveSheet()->getHighestColumn(); $i++) {
            $spreadsheet->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }
        foreach ($data as $val) {
            $sheet->setCellValue('A' . $rows, $val->id);
            $sheet->setCellValue('B' . $rows, $val->jenis_bencana);
            $sheet->setCellValue('C' . $rows, $val->lokasi_tempat_kejadian);
            $sheet->setCellValue('D' . $rows, $val->tgl_bencana);
            $sheet->setCellValue('E' . $rows, $val->korban_laki);
            $sheet->setCellValue('F' . $rows, $val->korban_perempuan);
            $sheet->setCellValue('G' . $rows, $val->usia_0_5);
            $sheet->setCellValue('H' . $rows, $val->usia_6_20);
            $sheet->setCellValue('I' . $rows, $val->usia_21_60);
            $sheet->setCellValue('J' . $rows, $val->usia_61);
            $sheet->setCellValue('K' . $rows, $val->ibu_hamil);
            $sheet->setCellValue('L' . $rows, $val->meninggal);
            $sheet->setCellValue('M' . $rows, $val->hilang);
            $sheet->setCellValue('N' . $rows, $val->luka);
            $sheet->setCellValue('O' . $rows, $val->mengungsi);
            $sheet->setCellValue('P' . $rows, $val->jenis_prasarana);
            $sheet->setCellValue('Q' . $rows, $val->rusak_ringan);
            $sheet->setCellValue('R' . $rows, $val->rusak_sedang);
            $sheet->setCellValue('S' . $rows, $val->rusak_berat);
            $sheet->setCellValue('T' . $rows, $val->keterangan);

            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $filepath = $fileName;
        $writer->save($filepath);

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush();
        readfile($filepath);
        exit;
    }
}
