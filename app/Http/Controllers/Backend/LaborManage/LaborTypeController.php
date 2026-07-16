<?php

namespace App\Http\Controllers\Backend\LaborManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaborType\LaborTypeStoreRequest;
use App\Http\Requests\LaborType\LaborTypeUpdateRequest;
use App\Models\BoqCategories;
use App\Models\LaborType;
use Illuminate\Http\Request;

class LaborTypeController extends Controller
{
    public function index()
    {
        $laborTypes = LaborType::with('boqCategory')->get();
        
        return view('admin.backend.labor-type.index',compact('laborTypes'));
    }

    public function create()
    {
        
        $boqCategories = BoqCategories::all();
        return view('admin.backend.labor-type.create',compact('boqCategories'));
    }

    public function store(LaborTypeStoreRequest $request)
    {
        LaborType::create([
            
            'boq_category_id' => $request->boq_category_id,
            'name' => $request->name,
            'unit' => $request->unit,
        ]);
        
        return redirect()
            ->route('labor.type.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        
        $type = LaborType::findOrFail($id);
        $boqCategories = BoqCategories::all();
        return view('admin.backend.labor-type.edit',compact('type','boqCategories'));
    }

    public function update(LaborTypeUpdateRequest $request, $id)
    {

        $type = LaborType::findOrFail($id);

        $type->update([
            
            'boq_category_id' => $request->boq_category_id,
            'name' => $request->name,
            'unit' => $request->unit,
            
        ]);
        
        return redirect()
            ->route('labor.type.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $type = LaborType::findOrFail($id);
        $type->delete();

        return redirect()
            ->route('labor.type.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }


}
