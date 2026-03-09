<?php

namespace App\Http\Controllers\Backend\QSTeamCheck;

use App\Http\Controllers\Controller;
use App\Models\EngineerAssetRequestItems;
use App\Models\EngineerAssetRequests;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class QSTeamCheckController extends Controller
{
    public function create($id)
    {
        $requestItemsCheck = EngineerAssetRequests::with('engineerAssetRequestItems.asset.fixedAsset')->findOrFail($id);
        $workscope = WorkScope::all();
        return view('admin.backend.qs-team-check.create', compact('requestItemsCheck','workscope'));
    }

    public function store(Request $request)
    {

        foreach ($request->items as $item) {

            EngineerAssetRequestItems::where('id', $item['id'])
                ->update([
                    'passed_qty' => $item['passed_qty']
                ]);
        }

        EngineerAssetRequests::where('id', $request->request_id)
            ->update([
                'qs_status' => 'completed'
            ]);

        return redirect()->route('engineer.request.list');
    }
}
