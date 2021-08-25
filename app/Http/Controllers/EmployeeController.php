<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index(Request $request): View|RedirectResponse
    {
        $employees = $this->employeeRepository->index($request);

        if (!$employees) {
            return redirect()->route('employee.create');
        }
        return view('employee.index', compact('employees'));

//        $employees= Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|
     */
    public function create(): View|Factory|Application
    {
        return view('employee.create', [
            'companies' => Company::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeFormRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeFormRequest $request): RedirectResponse
    {
        // $input=$request->all();
        // Employee::create($input);

        $this->employeeRepository->store($request);

        return redirect()->route('employee.index')
            ->with('success', 'Employees created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function show(Employee $employee): View|Factory|Application
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit(Employee $employee): View|Factory|Application
    {
        return view('employee.edit', [
            'employee' => $employee,
            'companies' => Company::all(),
        ]);

        // return view('employee.edit', compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeFormRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeFormRequest $request, Employee $employee): RedirectResponse
    {
//        $input=$request->all();
//        $employee->update($input);
        $employee->update($request->all());

        return redirect()->route('employee.index')
            ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success', 'Employee deleted successfully.');

    }

}
