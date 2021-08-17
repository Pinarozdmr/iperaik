<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $employees= Employee::all();
        return view('employee.index', compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('employee.create', [
            'companies' => Company::all(),
        ]);
    }
         //return view('company.create');

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeFormRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeFormRequest $request)
    {
        $input=$request->all();

        Employee::create($input);

        return redirect()->route('employee.index')
            ->with('success','Employees created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function show(Employee $employee)
    {
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View
     */
    public function edit(Employee $employee)
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
     * @param Request $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        $input=$request->all();
        $employee->update($input);

        return redirect()->route('employee.index')
            ->with('success','Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success','Employee deleted successfully.');

    }

}
