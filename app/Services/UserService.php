<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\UserRepoInterface;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepoInterface;

    public function __construct(UserRepoInterface $userRepoInterface)
    {
        $this->userRepoInterface = $userRepoInterface;
    }

    public function all()
    {
        return $this->userRepoInterface->findAll();
    }

    public function find($id)
    {
        return $this->userRepoInterface->find($id);
    }

    public function create(array $data)
    {
        $record = $this->userRepoInterface->create($data);
        return $record;
    }

    public function generateCode($type)
    {
        $prefix = [
            'Admin' => 'EMP-',
            'Design_Structure' => 'EMP-',
            'Design_Archi' => 'EMP-',
            'Digital_Marketing' => 'EMP-',
            'Finance_Account' => 'EMP-',
            'Management_Director' => 'EMP-',
            'Procurement' => 'EMP-',
            'QS' => 'EMP-',
            'Engineer' => 'EMP-',
            'Sales_Marketing' => 'EMP-',
            'HR' => 'EMP-',
        ];

        $count = User::where('department', $type)->count() + 1;

        return ($prefix[$type] ?? 'EMP-') . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    public function userDataTable(Request $request)
    {
        $currentUserId = Auth::id();

        $query = $this->userRepoInterface->query();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('employeetype', function ($user) {
                return $user->employeetype;
            })
            ->editColumn('department', function ($user) {
                $color = match ($user->department) {
                    'Admin' => 'bg-success',
                    'Design_Structure' => 'bg-info',
                    'Designer_Archi' => 'bg-info',
                    'Digital_Marketing' => 'bg-warning',
                    'Sales_Marketing' => 'bg-info',
                    'Finance_Account' => 'bg-danger',
                    'Management_Director' => 'bg-danger',
                    'Procurement' => 'bg-warning',
                    'Engineer' => 'bg-danger',
                    'QS' => 'bg-warning',
                    'HR' => 'bg-warning',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $user->department . '</span>';
            })
            ->addColumn('employee_number', function ($user) {
                return $user->employee_number;
            })
            ->addColumn('role', function ($user) {
                return $user->roles->map(function ($role) {
                    return '<span class="badge bg-danger me-1">' . $role->name . '</span>';
                })->implode(' ');
            })
            ->addColumn('gender', function ($user) {
                return $user->gender;
            })
            ->addColumn('nrc', function ($user) {
                return $user->nrc;
            })
            ->editColumn('nrcfrontphoto', function ($user) {
                if ($user->nrcfrontphoto) {
                    return '<img src="' . $user->acsrNrcFrontImagePath . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('nrcbackphoto', function ($user) {
                if ($user->nrcbackphoto) {
                    return '<img src="' .  $user->acsrNrcBackImagePath . '" width="50" class="rounded">';
                }
                return  'No Photo';
            })
            ->editColumn('householdphoto', function ($user) {
                if ($user->householdphoto) {
                    return '<img src="' . $user->acsrHouseholdImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('referenceletter', function ($user) {
                if ($user->referenceletter) {
                    return '<img src="' . $user->acsrReferenceImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('esingphoto', function ($user) {
                if ($user->esingphoto) {
                    return '<img src="' . $user->acsrEsingImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })

            ->editColumn('photo', function ($user) {
                return '<img src="' . $user->acsrImagePath  . '" alt=""  class="rounded" width="50">';
            })
            ->editColumn('joindate', function ($user) {
                return Carbon::parse($user->joindate)->format("Y-m-d H:i:s");
            })
            ->editColumn('status', function ($user) use ($currentUserId) {
                if ($user->id === $currentUserId) {
                    return '<span class="badge badge-soft-success">Active</span>';
                }

                return '<span class="badge badge-soft-danger">Inactive</span>';
            })
            // ->editColumn('status', function ($user) {
            //     return '<span style="color: #' . $user->acsrStatus['color'] . '">' . $user->acsrStatus['text'] . '</span>';
            // })
            ->addColumn('action', function ($user) {
                return view('admin.backend.usermanage._action', compact('user'))->render();
            })
            ->rawColumns([
                'nrcfrontphoto',
                'nrcbackphoto',
                'householdphoto',
                'referenceletter',
                'esingphoto',
                'photo',
                'status',
                'role',
                'action',
                'department',
            ])
            ->make(true);
    }

    public function resignEmployeeDataTable(Request $request)
    {
        $currentUserId = Auth::id();

        $query = $this->userRepoInterface->findResignedUsers();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('employeetype', function ($user) {
                return $user->employeetype;
            })
            ->addColumn('is_block', function ($user) {
                return $user->is_block;
            })
            ->editColumn('department', function ($user) {
                $color = match ($user->department) {
                    'Design_Structure' => 'bg-info',
                    'Designer_Archi' => 'bg-info',
                    'Digital_Marketing' => 'bg-warning',
                    'Sales_Marketing' => 'bg-info',
                    'Finance_Account' => 'bg-danger',
                    'Management_Director' => 'bg-danger',
                    'Procurement' => 'bg-warning',
                    'Engineer' => 'bg-success',
                    'QS' => 'bg-warning',
                    'HR' => 'bg-warning',
                    default => 'bg-danger',
                };

                return '<span class="badge badge-status ' . $color . '">' . $user->department . '</span>';
            })
            ->addColumn('employee_number', function ($user) {
                return $user->employee_number;
            })
            ->addColumn('gender', function ($user) {
                return $user->gender;
            })
            ->addColumn('nrc', function ($user) {
                return $user->nrc;
            })
            ->editColumn('nrcfrontphoto', function ($user) {
                if ($user->nrcfrontphoto) {
                    return '<img src="' . $user->acsrNrcFrontImagePath . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('nrcbackphoto', function ($user) {
                if ($user->nrcbackphoto) {
                    return '<img src="' .  $user->acsrNrcBackImagePath . '" width="50" class="rounded">';
                }
                return  'No Photo';
            })
            ->editColumn('householdphoto', function ($user) {
                if ($user->householdphoto) {
                    return '<img src="' . $user->acsrHouseholdImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('referenceletter', function ($user) {
                if ($user->referenceletter) {
                    return '<img src="' . $user->acsrReferenceImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })
            ->editColumn('esingphoto', function ($user) {
                if ($user->esingphoto) {
                    return '<img src="' . $user->acsrEsingImagePath  . '" width="50" class="rounded">';
                }
                return 'No Photo';
            })

            ->editColumn('photo', function ($user) {
                return '<img src="' . $user->acsrImagePath  . '" alt=""  class="rounded" width="50">';
            })
            ->editColumn('joindate', function ($user) {
                return Carbon::parse($user->joindate)->format("Y-m-d H:i:s");
            })
            ->editColumn('resign_date', function ($user) {
                return optional($user->resign_date)
                    ? Carbon::parse($user->resign_date)->format('Y-m-d')
                    : '-';
            })
            ->editColumn('status', function ($user) use ($currentUserId) {
                if ($user->id === $currentUserId) {
                    return '<span class="badge badge-soft-success">Active</span>';
                }

                return '<span class="badge badge-soft-danger">Inactive</span>';
            })
            ->rawColumns([
                'nrcfrontphoto',
                'nrcbackphoto',
                'householdphoto',
                'referenceletter',
                'esingphoto',
                'photo',
                'status',
                'department',
                'resign_date',
            ])
            ->make(true);
    }

    public function update($id, array $data)
    {
        // $record = $this->userRepoInterface->find($id);
        $record = $this->userRepoInterface->update($data, $id);
        return $record;
    }



    public function delete($id)
    {
        $record = $this->userRepoInterface->find($id);
        $record->delete();
    }
}
