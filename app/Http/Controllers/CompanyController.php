<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload()

    {

        return view('imageUpload');

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost(Request $request)

    {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */


        return back()

            ->with('success','You have successfully upload image.')

            ->with('image',$imageName);

    }

    public function index()
    {
        $companies= Company:: paginate(10);
        return view('company.index', compact('companies'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */


    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'app/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $companies)
    {
    return view('company.show',compact('companies'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
        ]);

        $company->update($request->all());

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'app/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $company->update($input);

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
            ->with('success','Company deleted successfully.');


    }
}
