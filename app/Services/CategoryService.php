<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepoInterface;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryService
{
    protected $categoryRepoInterface;

    public function __construct(CategoryRepoInterface $categoryRepoInterface)
    {
        $this->categoryRepoInterface = $categoryRepoInterface;
    }
    public function all()
    {
        return $this->categoryRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->categoryRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->categoryRepoInterface->create($data);
        return $record;
    }

    public function categoryDataTable(Request $request)
    {

        $query = $this->categoryRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('category_name', function ($category) {
                return $category->category_name;
            })
            ->addColumn('action', function ($category) {
                return view('admin.backend.materialmanage.fixedassets.category._action', compact('category'))->render();
            })
            ->rawColumns([
                'category_name',
                'action',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->categoryRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->categoryRepoInterface->find($id);
        $record->delete();
    }
}
