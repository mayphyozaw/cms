<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FixedAsset;
use Illuminate\Http\Request;

class AssetRequestController extends Controller
{
    public function fixedAssets(Request $request)
    {
        
        $fixedAssets = FixedAsset::select('id','name') // using eagerloading
            ->when($request->search, function($q1) use ($request){
                $q1->whereHas('name', 'LIKE', "%$request->search%");
        })->paginate(5);
                
        return $fixedAssets; 
    }
}
