<?php

namespace App\Exports;

use App\Models\Resident;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;

class ResidentExport implements FromView, Responsable
{      
    use Exportable;

    protected $residents;


    public function __construct(array $residents)
    {
        $this->residents = $residents;
    }

    public function view(): View
    {      
       
        return view('exports.residentMontly', [
            'residents' =>  Resident::whereIn('id', array_values($this->residents))->get()
        ]);
    }

}