<?php

namespace App\Exports;

use App\Models\Company;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings():array
    {
        return [
            'name',
            'email',
            'website',
            'phone',
            'address',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Company::all();
        return collect(Company::getCompany());
    }
}
