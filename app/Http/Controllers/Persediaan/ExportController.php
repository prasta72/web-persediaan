<?php

namespace App\Http\Controllers\persediaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;




class ExportController extends Controller
{

    public function exportPdf(){
        $fpdf = new Pdf_mc_table();
        $fpdf->SetMargins(12, 12, 10);
        $fpdf->AddPage('L','A4',0);
        $fpdf->Image(public_path('image/logo_krs.png'),100,10,-1200);
        $fpdf->SetFont('arial', 'B', 11);
        $fpdf->Cell(280, 0,'KABUPATEN KARANGASEM',0,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(280, 10,'REKAPITULASI PERSEDIAAN',0,0,'C');
        $fpdf->Ln();
        $fpdf->Cell(280, 0,'PER 1 JANUARI - 31 DESEMBER ' . date('Y'),0,0,'C');
        $fpdf->Ln(15);
        $fpdf->SetFont('arial', 'B', 9);
        $fpdf->Cell(0, 10,'SKPD',0,0,'L');
        $fpdf->Cell(-240, 10,':',0,0,'R');
        $fpdf->Cell(0, 10,'BAGIAN PENGENDALIAN PEMBANGUNAN',0,0,'L ');
        $fpdf->Ln();
        $fpdf->Cell(0, 0,'KABUPATEN',0,0,'L');
        $fpdf->Cell(-240, 0,':',0,0,'R');
        $fpdf->Cell(0, 0,'KARANGASEM',0,0,'L');
        $fpdf->Ln();
        $fpdf->Cell(0, 10,'PROVINSI',0,0,'L');
        $fpdf->Cell(-240, 10,':',0,0,'R');
        $fpdf->Cell(0, 10,'BALI',0,0,'L');
        $fpdf->Ln(10);
        $fpdf->SetFont('arial', 'B', 8);
        $fpdf->Cell(41,6,'Rekening','LTR',0,'C',0);
        $fpdf->Cell(45,6,'Uraian','LTR',0,'C',0);
        $fpdf->Cell(45,6,'Saldo Awal','LTRB',0,'C',0);
        $fpdf->Cell(45,6,'Penerimaan','LTRB',0,'C',0);
        $fpdf->Cell(45,6,'Pengeluaran','LTRB',0,'C',0);
        $fpdf->Cell(45,6,'Saldo Akhir','LTRB',0,'C',0);
        $fpdf->Ln();
        $fpdf->Cell(41,6,'','LRB',0,'C',0);
        $fpdf->Cell(45,6,'','LRB',0,'C',0);
        $fpdf->Cell(15,6,'Jumlah','LRB',0,'C',0);
        $fpdf->Cell(30,6,'Harga','LRB',0,'C',0);
        $fpdf->Cell(15,6,'Jumlah','LRB',0,'C',0);
        $fpdf->Cell(30,6,'Harga','LRB',0,'C',0);
        $fpdf->Cell(15,6,'Jumlah','LRB',0,'C',0);
        $fpdf->Cell(30,6,'Harga','LRB',0,'C',0);
        $fpdf->Cell(15,6,'Jumlah','LRB',0,'C',0);
        $fpdf->Cell(30,6,'Harga','LRB',0,'C',0);
        //contain
        $fpdf->ln();
        $fpdf->SetFont('arial', '', 8);
        $fpdf->Cell(25,6,'1.20.1.20.03.20.14','LRB',0,'L',0);
        $fpdf->Cell(16,6,'5.2.2.05.03','LRB',0,'L',0);
        $fpdf->Cell(45,6,'Belanja Jasa Servis Kendaraan Roda Empat','LRB',0,'C',0);
        $fpdf->Output('persediaan.pdf', 'I');
       
        exit;
    }
}
