<?php


namespace App\Repositories;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeRepository
{

    public function index(Request $request)
    {
        return Employee::query()
            ->with('company')
            ->when($request->input('firstname'), fn($query, $value) => $query->where('firstname', 'LIKE', '%' . $value . '%'))
            ->when($request->input('lastname'), fn($query, $value) => $query->where('lastname', 'LIKE', '%' . $value . '%'))
            ->when($request->input('email'), fn($query, $value) => $query->where('email', 'LIKE', '%' . $value . '%'))
            ->when($request->input('phone'), fn($query, $value) => $query->where('phone', 'LIKE', '%' . $value . '%'))
            ->paginate(10);
    }

    public function store(EmployeeFormRequest $request)
    {
        Employee::create($request->all());

    }
}
