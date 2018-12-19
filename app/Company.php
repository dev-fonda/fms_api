<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public static $createRules = [
        'code' => 'required',
        'name' => 'required',
    ];

    public static $updateRules = [
        'code' => 'required',
        'name' => 'required',
    ];

    public static function createCompany($request) {
        $company = new Company;

        $company->code = $request->code;
        $company->name = $request->name;
        $company->corp_ofc_location = $request->corp_ofc_location;
        $company->corp_ofc_address = $request->corp_ofc_address;
        $company->comm_ofc_location = $request->comm_ofc_location;
        $company->comm_ofc_address = $request->comm_ofc_address;
        $company->status = $request->status;
        $result = $company->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'Company has been created']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to create company']);
        }
    }

    public static function readCompany() {
        return Company::all();
    }

    public static function updateCompany($request, $id) {
        $company = Company::find($id);

        $company->code = $request->code;
        $company->name = $request->name;
        $company->corp_ofc_location = $request->corp_ofc_location;
        $company->corp_ofc_address = $request->corp_ofc_address;
        $company->comm_ofc_location = $request->comm_ofc_location;
        $company->comm_ofc_address = $request->comm_ofc_address;
        $company->status = $request->status;
        $result = $company->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'Company has been updated']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to update company']);
        }
    }

    public static function showCompany($id) {
        return Company::where('id', $id)->first();
    }
}
