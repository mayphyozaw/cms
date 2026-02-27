<?php

namespace App\Http\Controllers\Backend\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleHasPermissionController extends Controller
{
    public function allRolesPermission()
    {
        $roles = Role::all();
        return view('admin.backend.configuration.role.index', compact('roles'));
    }
}
