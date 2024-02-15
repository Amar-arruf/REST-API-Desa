<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Laravolt\Indonesia\Facade as Indonesia;
use Laravolt\Indonesia\Models\Village;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        Indonesia::allVillages();
        return Indonesia::paginateVillages($numRows = 10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // validation input request
        $validator = FacadesValidator::make($request->json()->all(),[
            'code' => 'required|min_digits:6',
            'district_code' => 'required|digits:6',
            'name' => 'required|regex:/^(?:.*[a-zA-Z])(?:.*\s+)\w+$/',
            'meta' => 'required|array:pos,lat,long',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = Village::create($request->json()->all());
        return response()->json($data,201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Indonesia::findVillage(intval($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //validation input request
        $validator = FacadesValidator::make($request->json()->all(),[
            'district_code' => 'required|digits:6',
            'name' => 'required|regex:/^(?:.*[a-zA-Z])(?:.*\s+)\w+$/',
            'meta' => 'required|array:pos,lat,long',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $affected = Village::where('id',intval($id))->update($request->json()->all());
        if ($affected) {
            return response()->json(['status'=> 200, 'message' => 'data berhasil di update dengan id: '.$id],200);
        } else {
            return response()->json(['status'=> 400, 'message' => 'data gagal di update dengan id: '.$id],400);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $village = Village::find(intval($id));
        $village->delete();
        return response()->json(['status'=> 204, 'message' => 'data desa berhasil di hapus dengan id :'.$id]);
    }
}
