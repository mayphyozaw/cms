<?php

namespace App\Http\Controllers\Backend\BQ;

use App\Http\Controllers\Controller;
use App\Http\Requests\BQ\BQCategoryStoreRequest;
use App\Http\Requests\BQ\BQCategoryUpdateRequest;
use App\Models\BoqCategories;
use Illuminate\Http\Request;

class BoqCategoriesController extends Controller
{
    public function index()
    {
        $bqCategories = BoqCategories::all();
        return view('admin.backend.bq.bqcategory.index', compact('bqCategories'));
    }

    public function create()
    {
        return view('admin.backend.bq.bqcategory.create');
    }

    public function store(BQCategoryStoreRequest $request)
    {

        $bq_categories = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        BoqCategories::create($bq_categories);

        return redirect()->route('bq.bqcategory.index')
            ->with([
                'message' => 'Successfully created',
                'alert-type' => 'success'
            ]);
    }

    public function edit($id)
    {
        $bqCategory = BoqCategories::findOrFail($id);
        return view('admin.backend.bq.bqcategory.edit', compact('bqCategory'));
    }

    public function update(Request $request, $id)
    {
        $bqCategory = BoqCategories::findOrFail($id);
        $bqCategory->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);


        return redirect()->route('bq.bqcategory.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
         $bqCategory = BoqCategories::findOrFail($id);
         $bqCategory->delete();

         return redirect()->route('bq.bqcategory.index')
            ->with('message', 'Successfully deleted')
            ->with('alert-type', 'success');
    }
}
