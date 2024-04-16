<?php

namespace App\Exports;

use App\Models\Asn;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class AsnExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\FromQuery
    */
    public function collection()
    {
        return Asn::all();
    }
    
}
