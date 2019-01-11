<?php

namespace App\Http\Controllers;

use App\MewrHawker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacade;
use App\Exceptions\Handler;

class MewrHawkerController extends Controller
{   
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function create(Request $request) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(MewrHawker::$createRules)) {
                return response()->json(MewrHawker::createMewrHawker($request));
            }         
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function read() {
        if(RequestFacade::ajax()) {
            return response()->json(MewrHawker::readMewrHawker());
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
    
    public function update(Request $request, $id) {
        if(RequestFacade::isMethod('post')) {
            if ($request->validate(MewrHawker::$updateRules)) {
                return response()->json(MewrHawker::updateMewrHawker($request, $id));
            } 
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }

    public function show($id) {
        if(RequestFacade::ajax()) {
            return response()->json(MewrHawker::showMewrHawker($id));
        } else {
            abort(403, 'No direct script access allowed.');
        }
    }
}
