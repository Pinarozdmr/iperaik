<?php


namespace App\Exports;


use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection,WithHeadings
{
    use Exportable;

    public function headings():array
    {
        return [
            'id',
            'firstname',
            'lastname',
            'email',
            'phone',
            'company_id',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): \Illuminate\Support\Collection
    {
        return Employee::all();
        //return collect(Employee::getEmployee());
    }
}
