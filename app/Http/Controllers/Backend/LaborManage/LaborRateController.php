<?php

namespace App\Http\Controllers\Backend\LaborManage;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaborRate\LaborRateStoreRequest;
use App\Http\Requests\LaborRate\LaborRateUpdateRequest;
use App\Models\LaborRate;
use App\Models\LaborType;
use Illuminate\Http\Request;

class LaborRateController extends Controller
{
    public function index()
    {
        $laborRates = LaborRate::with('laborType')->get();
        return view('admin.backend.labor-rate.index', compact('laborRates'));
    }

    public function create()
    {
        $laborTypes = LaborType::all();
        return view('admin.backend.labor-rate.create', compact('laborTypes'));
    }

    public function store(LaborRateStoreRequest $request)
    {

        LaborRate::create([
            'labor_type_id' => $request->labor_type_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('labor.labor-rate.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $laborRate = LaborRate::findOrFail($id);
        $laborTypes = LaborType::all();

        return view('admin.backend.labor-rate.edit',compact('laborRate', 'laborTypes')
        );
    }

    public function update(LaborRateUpdateRequest $request, $id)
    {
        $laborRate = LaborRate::findOrFail($id);

        $laborRate->update([
            'labor_type_id' => $request->labor_type_id,
            'rate' => $request->rate,
            'effective_date' => $request->effective_date,
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()
            ->route('labor.labor-rate.index')
            ->with([
                'message' => 'Successfully updated',
                'alert-type' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $laborRate = LaborRate::findOrFail($id);
        $laborRate->delete();

        return redirect()
            ->route('labor.labor-rate.index')
            ->with([
                'message' => 'Successfully deleted',
                'alert-type' => 'success'
            ]);
    }
}
