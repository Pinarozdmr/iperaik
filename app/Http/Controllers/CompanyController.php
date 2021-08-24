<?php

namespace App\Http\Controllers;

use App\Exports\CompanyExport;
use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */

    public function imageUploadPost(Request $request): RedirectResponse
    {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);


        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);

    }
    public function index()
    {
        $companies= Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */


    public function create()
    {
        return view('company.create', [
            'employees' => Employee::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyFormRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyFormRequest $request)
    {
        $input=$request->all();
        if ($image = $request->file('image')) {
            $profileImage =Str::random(20).'_'. date('YmdHis') . "." . $image->getClientOriginalExtension();
            $input['image']=$profileImage;
            Storage::disk('public')->putFileAs('company_logo',$image,$profileImage);
        }

        Company::create($input);

        return redirect()->route('company.index')
            ->with('success','Companies created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function show(Company $company)
    {
        return view('company.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     *
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));

//        return view('company.edit', [
//            'company' => $company,
//            'companies' => Company::all(),
//            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyFormRequest $request, Company $company)
    {

        $input=$request->all();
        if ($image = $request->file('image')) {
            $profileImage =Str::random(20).'_'. date('YmdHis') . "." . $image->getClientOriginalExtension();

            $input['image']=$profileImage;
            Storage::disk('public')->putFileAs('company_logo',$image,$profileImage);
        }
        $company->update($input);

        return redirect()->route('company.index')
            ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
            ->with('success','Company deleted successfully.');

    }

    public function export()
    {
        return new CompanyExport;
    }

}

