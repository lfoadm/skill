<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCompanyRequest;
use App\Models\Admin\Company;
use App\Models\Admin\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        //dd($companies);
        return view('admin.companies.index', ['companies' => $companies]);
    }

    public function create()
    {
        $tenants = Tenant::all();
        return view('admin.companies.create', ['tenants' => $tenants]);
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = new Company();
        $company->tenant_id     = $request->tenant_id;
        $company->corporateName = $request->corporateName;
        $company->cnpj          = $request->cnpj;
        $company->fantasyName   = $request->fantasyName;
        $company->phone         = $request->phone;
        $company->email         = $request->email;
        $company->site          = $request->site;
        $company->instagram     = $request->instagram;
        
        if($request->hasFile('image') && $request->image->isValid())
        {
            $image = $request->file('image');
            $imageName = Carbon::now()->timestamp. '.' . $image->getClientOriginalExtension();
            $company->image = $image->storeAs('companies', $imageName);
            $company->image = $imageName;
        }
        
        $company->save();
        
        return redirect()->route('admin.companies.index')->with('message', 'Empresa cadastrada com sucesso!');
    }

    
    public function show($id)
    {
        $company = Company::find($id);
        
        return view('admin.companies.show', ['company' => $company]);
    }

    
    public function edit($id)
    {
        $tenants = Tenant::all();
        $company = Company::find($id);
        return view('admin.companies.edit', [
            'company' => $company,
            'tenants' => $tenants,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $company = Company::find($request->id);
        $company->tenant_id     = $request->tenant_id;
        $company->corporateName = $request->corporateName;
        $company->cnpj          = $request->cnpj;
        $company->fantasyName   = $request->fantasyName;
        $company->phone         = $request->phone;
        $company->email         = $request->email;
        $company->site          = $request->site;
        $company->instagram     = $request->instagram;
        
        if($request->hasFile('image') && $request->image->isValid())
        {
            if($company->image && Storage::exists('companies', $company->image))
            {
                unlink('storage/companies' . '/' . $company->image);
            }

            $image = $request->file('image');
            $imageName = Carbon::now()->timestamp. '.' . $image->extension();
            $company->image = $image->storeAs('companies', $imageName);
            $company->image = $imageName;
        }

        $company->save();
        
        return redirect()->route('admin.companies.index')->with('message', 'Empresa atualizada com sucesso!');
    }
    

    //APAGAR EMPRESA
    public function destroy(Request $request)
    {
        $company = Company::find($request->id);
        
        if($company->image && Storage::exists('companies', $company->image))
            {
                unlink('storage/companies' . '/' . $company->image);
            }

        Company::destroy($request->id);
        return redirect()->route('admin.companies.index')->with('msg', 'Empresa apagada com sucesso!');
    }

    //desativar empresas
    public function disable($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            
            $company = Company::find($id);
            $company->status = 0;
            $company->save();
        
            return redirect()->route('admin.companies.index');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    //ativar empresas
    public function enable($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $company = Company::find($id);
            $company->status = 1;
            $company->save();
            return redirect()->route('admin.companies.index');
        }
        else
        {
            return redirect()->route('login');
        }
    }

}
