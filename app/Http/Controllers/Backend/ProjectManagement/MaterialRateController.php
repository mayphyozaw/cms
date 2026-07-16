<?php

namespace App\Http\Controllers\Backend\ProjectManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRate\RateStoreRequest;
use App\Http\Requests\MaterialRate\RateUpdateRequest;
use App\Models\MaterialRate;
use App\Models\VariableAsset;
use Illuminate\Http\Request;

class MaterialRateController extends Controller
{
    public function index()
    {
        $rates = MaterialRate::with('material')->get();
        return view('admin.backend.materialrate.index', compact('rates'));
    }

    public function create()
    {
        $variableAssets = VariableAsset::all();
        return view('admin.backend.materialrate.create', compact('variableAssets'));
    }

    public function store(RateStoreRequest $request)
    {

        MaterialRate::create([
            'variable_asset_id' => $request->variable_asset_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('material.rate.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $rate = MaterialRate::findOrFail($id);
        $variableAssets = VariableAsset::all();

        return view('admin.backend.materialrate.edit',compact('rate', 'variableAssets')
        );
    }

    public function update(RateUpdateRequest $request, $id)
    {
        $rate = MaterialRate::findOrFail($id);

        $rate->update([
            'variable_asset_id' => $request->variable_asset_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('material.rate.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $rate = MaterialRate::findOrFail($id);
        $rate->delete();

        return redirect()
            ->route('material.rate.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
