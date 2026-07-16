<?php

namespace App\Http\Controllers\Backend\LaborManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaborType\LaborTypeStoreRequest;
use App\Http\Requests\LaborType\LaborTypeUpdateRequest;
use App\Models\LaborType;
use Illuminate\Http\Request;

class LaborTypeController extends Controller
{
    public function index()
    {
        $laborTypes = LaborType::all();
        return view('admin.backend.labor-type.index',compact('laborTypes'));
    }

    public function create()
    {
        
        return view('admin.backend.labor-type.create');
    }

    public function store(LaborTypeStoreRequest $request)
    {
        LaborType::create([
            
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
        return view('admin.backend.labor-type.edit',compact('type'));
    }

    public function update(LaborTypeUpdateRequest $request, $id)
    {

        $type = LaborType::findOrFail($id);

        $type->update([
            
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
