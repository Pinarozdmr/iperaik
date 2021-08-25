<?php


namespace App\Repositories;


use App\Http\Requests\CompanyFormRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyRepository
{

    public function index()
    {
        return Company::query()
            ->paginate(10);
    }


    public function store(CompanyFormRequest $request)
    {
        $input = $this->imageUpload($request);

        Company::create($input);

//        $input = $request->all();
////        if ($image = $request->file('image')) {
////            $profileImage = Str::random(20) . '_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
////            $input['image'] = $profileImage;
////            Storage::disk('public')->putFileAs('company_logo', $image, $profileImage);
//
//    }

    }

    public function update(CompanyFormRequest $request, Company $company)
    {
        $input = $this->imageUpload($request);
        $company->update($input);
    }

    private function imageUpload(CompanyFormRequest $request): array
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $profileImage = Str::random(20) . '_' . date('YmdHis') . "." . $image->getClientOriginalExtension();

            $input['image'] = $profileImage;
            Storage::disk('public')->putFileAs('company_logo', $image, $profileImage);
        }
        return $input;
    }

}
