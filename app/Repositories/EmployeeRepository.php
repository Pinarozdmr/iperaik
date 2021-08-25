<?php


namespace App\Repositories;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;


class EmployeeRepository
{

    public function index()
    {
        return Employee::query()
            ->with('company')
            ->paginate(10);
    }

    public function store(EmployeeFormRequest $request)
    {
        Employee::create($request->all());

    }
}
