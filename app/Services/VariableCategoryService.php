<?php

namespace App\Services;

use App\Repositories\Contracts\VariableCategoryRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class VariableCategoryService
{
    protected $variableCategoryRepoInterface;

    public function __construct(VariableCategoryRepoInterface $variableCategoryRepoInterface )
    {
        $this->variableCategoryRepoInterface = $variableCategoryRepoInterface;
    }
    public function all()
    {
        return $this->variableCategoryRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->variableCategoryRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->variableCategoryRepoInterface->create($data);
        return $record;
    }

    public function variablecategoryDataTable(Request $request)
    {

        $query = $this->variableCategoryRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('variable_category_name', function ($category) {
                return $category->variable_category_name;
            })
            ->addColumn('action', function ($category) {
                return view('admin.backend.materialmanage.variableassets.variable-category._action', compact('category'))->render();
            })
            ->rawColumns([
                'variable_category_name',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->variableCategoryRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->variableCategoryRepoInterface->find($id);
        $record->delete();
    }
}
