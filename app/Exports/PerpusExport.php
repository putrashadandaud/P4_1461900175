<?php

namespace App\Exports;

use App\Models\Perpus;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerpusExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perpus::all();
    }
}
