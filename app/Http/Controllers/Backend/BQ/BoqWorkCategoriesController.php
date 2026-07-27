<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Http\Requests\BQ\BQWorkCategoryStoreRequest;
use App\Http\Requests\BQ\BQWorkCategoryUpdateRequest;
use App\Models\BoqWorkCategories;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class BoqWorkCategoriesController extends Controller
{
    public function index()
    {
        $bqWorkCategories = BoqWorkCategories::all();
        return view('admin.backend.bq.bqworkcategory.index', compact('bqWorkCategories'));
    }

    public function create()
    {
        $workscopes = WorkScope::all();
        return view('admin.backend.bq.bqworkcategory.create',compact('workscopes'));
    }

    public function store(BQWorkCategoryStoreRequest $request)
    {
        
        BoqWorkCategories::create([
            'work_scope_id' => $request->work_scope_id,
            'category_name' => $request->category_name,
            'boq_work_types' => $request->boq_work_types,
        ]);

        return redirect()->route('bq.bqworkcategory.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $bqworkcategory = BoqWorkCategories::findOrFail($id);
        $workscopes = WorkScope::all();
        return view('admin.backend.bq.bqworkcategory.edit', compact('bqworkcategory','workscopes'));
    }

    public function update(BQWorkCategoryUpdateRequest $request, $id)
    {
        $bqworkcategory = BoqWorkCategories::findOrFail($id);
        $bqworkcategory->update([
            'work_scope_id' => $request->work_scope_id,
            'category_name' => $request->category_name,
            'boq_work_types' => $request->boq_work_types,
        ]);


        return redirect()->route('bq.bqworkcategory.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
         $bqworkcategory = BoqWorkCategories::findOrFail($id);
         $bqworkcategory->delete();

         return redirect()->route('bq.bqworkcategory.index')
            ->with('message', 'Successfully deleted')
            ->with('alert-type', 'success');
    }
}
