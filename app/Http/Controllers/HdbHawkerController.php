<?php

namespace App\Http\Controllers;

use App\HdbHawker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Exceptions\Handler;

class HdbHawkerController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function create(Request $request) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(HdbHawker::$createRules)) {
                return response()->json(HdbHawker::createHdbHawker($request));
            }         
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function read() {
        if(RequestFacade::ajax()) {
            return response()->json(HdbHawker::readHdbHawker());
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
    
    public function update(Request $request, $id) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(HdbHawker::$updateRules)) {
                return response()->json(HdbHawker::updateHdbHawker($request, $id));
            } 
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function show($id) {
        if(RequestFacade::ajax()) {
            return response()->json(HdbHawker::showHdbHawker($id));
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
}
