<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings():array
    {
        return [
            'id',
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
    public function collection(): \Illuminate\Support\Collection
    {
        return Company::all();
        //return collect(Company::getCompany());
    }
}
