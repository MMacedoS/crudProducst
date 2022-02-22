<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use PDF;
class RelatorioController extends Controller
{
    //

    public function gerarPDF()
    {
        $tags = Tag::all();
        $pdf = PDF::loadView('pdf',compact('tags'));

        return $pdf->setPaper('a4')->stream('Todos os Produtos');
    }
}
