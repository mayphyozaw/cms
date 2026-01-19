<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResignEmployees\ResignEmployeeStoreRequest;
use App\Http\Requests\ResignEmployees\ResignEmployeeUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResignController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return view('admin.backend.resign-employees.index', compact('users'));
    }

    public function resignEmployeeDataTable(Request $request)
    {
        return $this->userService->resignEmployeeDataTable($request);
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.backend.resign-employees.index', compact('user'));
    // }

    public function confirm_resign(ResignEmployeeUpdateRequest $request)
    {
        $id = $request->user_id;
        $user = $this->userService->find($id);
        $user->resign_date = $request->resign_date;
        $user->update();

        return redirect()->route('resign-employees.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }
}
