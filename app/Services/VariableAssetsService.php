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
                return $variableAssets->category->variable_category_name ?? '';
            })

            ->editColumn('unit', function ($variableAssets) {
                return $variableAssets->unit ?? '';
            })
            ->editColumn('toal_qty', function ($variableAssets) {
                return $variableAssets->toal_qty ?? '';
            })
            ->editColumn('reorder_level', function ($variableAssets) {
                $color = match ($variableAssets->reorder_level) {
                    'Available' => 'bg-success',
                    'InUse' => 'bg-priamary',
                    'UnderMaintenance' => 'bg-info',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $variableAssets->status . '</span>';
            })
            ->addColumn('action', function ($variableAssets) {
                return view('admin.backend.materialmanage.variableassets._action', compact('variableAssets'))->render();
            })
            ->rawColumns([
                'name',
                'variable_category_name',
                'unit',
                'total_qty',
                'reorder_level',
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
