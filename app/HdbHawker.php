<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HdbHawker extends Model
{
    
    //
    public static $createRules = [
        'location' => 'required',
        'no_of_stall' => 'required',
    ];

    public static $updateRules = [
        'location' => 'required',
        'no_of_stall' => 'required',
    ];

    public static function createHdbHawker($request) {
        $HdbHawker = new HdbHawker;

        $HdbHawker->location = $request->location;
        $HdbHawker->no_of_stall = $request->no_of_stall;
        $HdbHawker->created_by = $request->created_by;
        $HdbHawker->updated_by = $request->updated_by;
        $result = $HdbHawker->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'HDB Hawker has been created']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to create HDB Hawker']);
        }
    }

    public static function readHdbHawker() {
        return HdbHawker::all();
    }

    public static function updateHdbHawker($request, $id) {
        $HdbHawker = HdbHawker::find($id);
        
        $HdbHawker->location = $request->location;
        $HdbHawker->no_of_stall = $request->no_of_stall;
        $HdbHawker->created_by = $request->created_by;
        $HdbHawker->updated_by = $request->updated_by;
        $result = $HdbHawker->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'HDB Hawker has been updated']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to update HDB Hawker']);
        }
    }

    public static function showHdbHawker($id) {
        return HdbHawker::where('id', $id)->first();
    }
}
