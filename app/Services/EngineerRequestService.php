<?php

namespace App\Services;

use App\Repositories\Contracts\EngineerRequestRepoInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class EngineerRequestService
{
    protected $engineerRequestRepoInterface;

    public function __construct(EngineerRequestRepoInterface $engineerRequestRepoInterface)
    {
        $this->engineerRequestRepoInterface = $engineerRequestRepoInterface;
    }

    public function all()
    {
        return $this->engineerRequestRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->engineerRequestRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->engineerRequestRepoInterface->create($data);
        return $record;
    }


    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->engineerRequestRepoInterface->update($data, $id);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->engineerRequestRepoInterface->find($id);
        $record->delete();
    }
}
