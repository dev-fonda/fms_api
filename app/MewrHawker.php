<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MewrHawker extends Model
{
    public static $createRules = [
        'hawker_centre' => 'required',
        'address' => 'required',
    ];

    public static $updateRules = [
        'hawker_centre' => 'required',
        'address' => 'required',
    ];

    public static function createMewrHawker($request) {
        $MewrHawker = new MewrHawker;

        $MewrHawker->hawker_centre = $request->hawker_centre;
        $MewrHawker->address = $request->address;
        $MewrHawker->estimated_gfa = $request->estimated_gfa;
        $MewrHawker->no_of_stall = $request->no_of_stall;
        $MewrHawker->created_by = $request->created_by;
        $MewrHawker->updated_by = $request->updated_by;
        $result = $MewrHawker->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'MEWR Hawker has been created']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to create MEWR Hawker']);
        }
    }

    public static function readMewrHawker() {
        return MewrHawker::all();
    }

    public static function updateMewrHawker($request, $id) {
        $MewrHawker = MewrHawker::find($id);

        $MewrHawker->hawker_centre = $request->hawker_centre;
        $MewrHawker->address = $request->address;
        $MewrHawker->estimated_gfa = $request->estimated_gfa;
        $MewrHawker->no_of_stall = $request->no_of_stall;
        $MewrHawker->created_by = $request->created_by;
        $MewrHawker->updated_by = $request->updated_by;
        $result = $MewrHawker->save();

        if ($result) {
            return response()->json(['success' => $result, 'message' => 'MEWR Hawker has been updated']);
        } else {
            return response()->json(['success' => $result, 'message' => 'Unable to update MEWR Hawker']);
        }
    }

    public static function showMEWRHawker($id) {
        return MewrHawker::where('id', $id)->first();
    }
}
