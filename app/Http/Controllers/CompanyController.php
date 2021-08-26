<?php

namespace App\Http\Controllers;

use App\Exports\CompanyExport;
use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use App\Repositories\CompanyRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CompanyController extends Controller
{

    private CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */

    public function imageUpload(): View
    {
        return view('imageUpload');
    }


    public function imageUploadPost(Request $request): RedirectResponse
    {
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);

    }

    public function index(Request $request): View|RedirectResponse
    {
        $companies = $this->companyRepository->index($request);

        if (!$companies) {
            return redirect()->route('company.create');
        }
        return view('company.index', compact('companies'));

        //$companies= Company::all();
        // return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */


    public function create(): View
    {

        return view('company.create');
//        return view('company.create', [
//            'employees' => Employee::all(),
//        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyFormRequest $request
     * @return RedirectResponse
     */

    public function store(CompanyFormRequest $request): RedirectResponse
    {

        $this->companyRepository->store($request);

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully.');

//        Company::create($input);
//
//        return redirect()->route('company.index')
//            ->with('success','Companies created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function show(Company $company): View
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return View
     *
     */
    public function edit(Company $company): View
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
     * @param CompanyFormRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyFormRequest $request, Company $company): RedirectResponse
    {
        $this->companyRepository->update($request, $company);

        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully');

        // $company->update($input);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {

         try {
             $company->delete();
        } catch (QueryException){

             return redirect()->route('company.index')
                ->with('errors',['This company could not be deleted because the company has employee information.']);
        }

             return redirect()->route('company.index')
                ->with('success', 'Company deleted successfully.');

    }

    public function export(Request $request): BinaryFileResponse
    {
        $type = $request->input('type');
        return Excel::download(new CompanyExport, 'Company List.' . $type);
    }
}

