<?php

namespace App\Services;

use App\Repositories\Contracts\FixedAssetRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class FixedAssetsService
{
    protected $fixedAssetRepoInterface;

    public function __construct(FixedAssetRepoInterface $fixedAssetRepoInterface)
    {
        $this->fixedAssetRepoInterface = $fixedAssetRepoInterface;
    }

    public function all()
    {
        return $this->fixedAssetRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->fixedAssetRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->fixedAssetRepoInterface->create($data);
        return $record;
    }

    public function fixedassetsDataTable()
    {

        $query = $this->fixedAssetRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()

            ->editColumn('assets_code', function ($fixedAssets) {
                return $fixedAssets->assets_code ?? '';
            })

            ->editColumn('name', function ($fixedAssets) {
                return $fixedAssets->name;
            })

            
            ->addColumn('category_name', function ($fixedAssets) {
                return $fixedAssets->category->category_name ?? '';
            })

            ->editColumn('unit', function ($fixedAssets) {
                return $fixedAssets->unit ?? '';
            })
            ->editColumn('total_qty', function ($fixedAssets) {
                return $fixedAssets->total_qty ?? '';
            })
            ->editColumn('status', function ($fixedAssets) {
                $color = match ($fixedAssets->status) {
                    'Available' => 'bg-success',
                    'InUse' => 'bg-priamary',
                    'UnderMaintenance' => 'bg-info',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $fixedAssets->status . '</span>';
            })
            ->addColumn('action', function ($fixedAssets) {
                return view('admin.backend.materialmanage.fixedassets._action', compact('fixedAssets'))->render();
            })
            ->rawColumns([
                'status',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->fixedAssetRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->fixedAssetRepoInterface->find($id);
        $record->delete();
    }
}
