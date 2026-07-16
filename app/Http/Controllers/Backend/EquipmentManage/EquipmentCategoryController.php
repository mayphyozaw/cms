<?php

namespace App\Http\Controllers\Backend\EquipmentManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Equipment\CategoryStoreRequest;
use App\Http\Requests\Equipment\CategoryUpdateRequest;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;

class EquipmentCategoryController extends Controller
{
    public function index()
    {
        $eqCategories = EquipmentCategory::all();
        return view('admin.backend.equipment-category.index',compact('eqCategories'));
    }

    public function create()
    {
        return view('admin.backend.equipment-category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        EquipmentCategory::create([
            
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()
            ->route('equipment.category.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }


    public function edit($id)
    {
        $eqCategory = EquipmentCategory::findOrFail($id);
        return view('admin.backend.equipment-category.edit',compact('eqCategory'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $eqCategory = EquipmentCategory::findOrFail($id);
        $eqCategory->update([
            
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()
            ->route('equipment.category.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    

    public function destroy($id)
    {
        $eqCategory = EquipmentCategory::findOrFail($id);
        $eqCategory->delete();

        return redirect()
            ->route('equipment.category.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
