<?php

namespace App\Imports;

use App\Models\DataMarket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ImportMarket implements FromView
{
    /**
    * @param Collection $collection
    */
    public function view(): View
    {
        return view('exports.market', [
            'market' => DataMarket::all()
        ]);
    }
}
