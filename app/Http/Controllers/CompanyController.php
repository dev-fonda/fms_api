<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Exceptions\Handler;
use Swagger\Annotations as SWG;

class CompanyController extends Controller
{   
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function create(Request $request) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(Company::$createRules)) {
                return response()->json(Company::createCompany($request));
            }         
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function read() {
        if(RequestFacade::ajax()) {
            return response()->json(Company::readCompany());
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
    
    public function update(Request $request, $id) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(Company::$updateRules)) {
                return response()->json(Company::updateCompany($request, $id));
            } 
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function show($id) {
        if(RequestFacade::ajax()) {
            return response()->json(Company::showCompany($id));
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
}
