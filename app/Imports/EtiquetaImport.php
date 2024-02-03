<?php

namespace App\Imports;

use App\Models\Etiqueta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EtiquetaImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2; // Ignora la primera fila y comienza desde la segunda fila.
    }

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Etiqueta([
            'producto' => $row[0],
            'laboratorio' => $row[1],
            'precio' => $row[2],
            'codbarra' => $row[3],
        ]);
    }
}
