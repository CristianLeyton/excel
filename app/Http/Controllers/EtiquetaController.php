<?php

namespace App\Http\Controllers;

use App\Exports\EtiquetaExport;
use App\Imports\EtiquetaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Etiqueta;
// Importa la clase PDF
use Barryvdh\DomPDF\Facade\PDF;

class EtiquetaController extends Controller
{
    public function index()
    {
        return view('import');
    }
    //...
    public function import(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Etiqueta::truncate();

        $file = $request->file('file');
        Excel::import(new EtiquetaImport, $file);
        return back()->with('success', 'Excel cargado correctamente, ya puede generar el PDF:');
    }

    public function export()
    {
        return Excel::download(new EtiquetaExport, 'products.xlsx');
    }

    public function pruebaVista()
    {
        $etiquetas = Etiqueta::all();
        $laboratorio = $etiquetas[0]->laboratorio;
        return view('imprimir_etiquetas', compact('etiquetas', 'laboratorio'));
    }

    public function generarPDF()
    {
        // Puedes personalizar la vista y los datos que deseas incluir en el PDF
        $etiquetas = Etiqueta::all();
        $laboratorio = $etiquetas[0]->laboratorio;

        // Carga la vista 'nombre_de_tu_vista' con los datos
        $pdf = PDF::loadView('imprimir_etiquetas', compact('etiquetas'));

        $pdf->render();
        /*return $pdf->stream('etiquetas-'.$laboratorio.'.pdf'); */
        // Descarga el PDF con un nombre específico
        return $pdf->download($laboratorio . '-etiquetas.pdf');
    }
}
