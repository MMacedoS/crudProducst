<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PDF;
class RelatorioController extends Controller
{
    //

    public function gerarPDF()
    {
        $products = Product::all();
        $pdf = PDF::loadView('pdf',compact('products'));

        return $pdf->setPaper('a4')->stream('Todos os Produtos');
    }
}
