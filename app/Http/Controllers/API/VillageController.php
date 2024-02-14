<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
