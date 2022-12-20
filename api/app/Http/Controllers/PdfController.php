<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function generatePDF()
    {
        
        $pdf = PDF::loadView('admin');
    
        return $pdf->download('Liste.pdf');
    }

}
