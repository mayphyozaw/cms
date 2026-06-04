<?php

namespace App\Services;

use App\Repositories\Contracts\VariableAssetRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class VariableAssetsService
{
    protected $variableAssetRepoInterface;

    public function __construct(VariableAssetRepoInterface $variableAssetRepoInterface)
    {
        $this->variableAssetRepoInterface = $variableAssetRepoInterface;
    }

    public function all()
    {
        return $this->variableAssetRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->variableAssetRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->variableAssetRepoInterface->create($data);
        return $record;
    }


    public function variableassetsDataTable()
    {

        $query = $this->variableAssetRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()

            ->editColumn('material_code', function ($variableAssets) {
                return $variableAssets->material_code ?? '';
            })

            ->editColumn('name', function ($variableAssets) {
                return $variableAssets->name;
            })

            ->addColumn('variable_category_name', function ($variableAssets) {
                return $variableAssets->variableCategory->variable_category_name ?? '';
            })
            
            ->editColumn('unit', function ($variableAssets) {
                return $variableAssets->unit ?? '';
            })
            
            ->addColumn('action', function ($variableAssets) {
                return view('admin.backend.materialmanage.variableassets._action', compact('variableAssets'))->render();
            })
            ->rawColumns([
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->variableAssetRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->variableAssetRepoInterface->find($id);
        $record->delete();
    }
}
