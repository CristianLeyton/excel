<?php

namespace App\Exports;

use App\Models\Etiqueta;
use Maatwebsite\Excel\Concerns\FromCollection;

class EtiquetaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Etiqueta::all();
    }
}
