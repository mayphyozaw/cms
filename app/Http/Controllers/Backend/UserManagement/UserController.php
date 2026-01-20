<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManage\UserStoreRequest;
use App\Http\Requests\UserManage\UserUpdateRequest;
use App\Models\User;
use App\Services\ResponseService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $currentUser = Auth::user();
        // $users = User::all();
        $users = $this->userService->all();


        // return view('backend.usermanage.index', compact('currentUser', 'users'));
        return view('admin.backend.usermanage.index', compact('currentUser', 'users'));
    }

    public function create()
    {
        return view('admin.backend.usermanage.create');
    }


    public function userDataTable(Request $request)
    {
        return $this->userService->userDataTable($request);
    }



    public function store(UserStoreRequest $request)
    {

        $nrc_front_img_name = null;
        if ($request->hasFile('nrcfrontphoto')) {
            $nrc_front_img_file = $request->file('nrcfrontphoto');
            $nrc_front_img_name = uniqid() . '_' . time() . '.' . $nrc_front_img_file->getClientOriginalExtension();
            $nrc_front_img_file->move(public_path('/upload/user_images'), $nrc_front_img_name);
        }
        $nrc_back_img_name = null;
        if ($request->hasFile('nrcbackphoto')) {
            $nrc_back_img_file = $request->file('nrcbackphoto');
            $nrc_back_img_name = uniqid() . '_' . time() . '.' . $nrc_back_img_file->getClientOriginalExtension();
            $nrc_back_img_file->move(public_path('/upload/user_images'), $nrc_back_img_name);
        }
        $household_img_name = null;
        if ($request->hasFile('householdphoto')) {
            $household_img_file = $request->file('householdphoto');
            $household_img_name = uniqid() . '_' . time() . '.' . $household_img_file->getClientOriginalExtension();
            $household_img_file->move(public_path('/upload/user_images'), $household_img_name);
        }

        $reference_letter_img_name = null;
        if ($request->hasFile('referenceletter')) {
            $reference_letter_img_file = $request->file('referenceletter');
            $reference_letter_img_name = uniqid() . '_' . time() . '.' . $reference_letter_img_file->getClientOriginalExtension();
            $reference_letter_img_file->move(public_path('/upload/user_images'), $reference_letter_img_name);
        }

        $user_img_name = null;
        if ($request->hasFile('photo')) {
            $user_img_file = $request->file('photo');
            $user_img_name = uniqid() . '_' . time() . '.' . $user_img_file->getClientOriginalExtension();
            $user_img_file->move(public_path('/upload/user_images'), $user_img_name);
        }
        $esign_img_name = null;
        if ($request->hasFile('esingphoto')) {
            $esign_img_file = $request->file('esingphoto');
            $esign_img_name = uniqid() . '_' . time() . '.' . $esign_img_file->getClientOriginalExtension();
            $esign_img_file->move(public_path('/upload/user_images'), $esign_img_name);
        }

        try {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'employeetype'   => $request->employeetype,
                'department'   => $request->department,
                'employee_number' => $this->userService->generateCode($request->employee_number),
                'gender'   => $request->gender,
                'nrc'   => $request->nrc,
                'nrcfrontphoto' => $nrc_front_img_name,
                'nrcbackphoto' => $nrc_back_img_name,
                'householdphoto' => $household_img_name,
                'referenceletter' => $reference_letter_img_name,
                'photo' => $user_img_name,
                'esingphoto' => $esign_img_name,
                'join' => $request->joindate,
                'contact_person' => $request->contact_person,
                'contact_number' => $request->contact_number,
                'status' => 'active',

            ];
            $this->userService->create($userData);

            return redirect()->route('usermanage.index')
                ->with([
                    'message' => 'Successfully created',
                    'alert-type' => 'success'
                ]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.backend.usermanage.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id)
    {

        $user = $this->userService->find($id);
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'employeetype' => $request->employeetype,
            'department' => $request->department,
            'employee_number' => $request->employee_number,
            'gender' => $request->gender,
            'nrc' => $request->nrc,
            'joindate' => $request->joindate,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'status' => $request->status ?? 'active',
            'role' => $request->role,
        ];



        if ($request->filled('password')) {
            $user_data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('nrcfrontphoto')) {
            if ($user->nrcfrontphoto && file_exists(public_path('upload/user_images/' . $user->nrcfrontphoto))) {
                unlink(public_path('upload/user_images/' . $user->nrcfrontphoto));
            }

            $nrc_front_img_file = $request->file('nrcfrontphoto');
            $nrc_front_img_name = uniqid() . '_' . time() . '.' . $nrc_front_img_file->getClientOriginalExtension();
            $nrc_front_img_file->move(public_path('/upload/user_images'), $nrc_front_img_name);

            $user_data['nrcfrontphoto'] = $nrc_front_img_name;
        }

        if ($request->hasFile('nrcbackphoto')) {
            if ($user->nrcbackphoto && file_exists(public_path('upload/user_images/' . $user->nrcbackphoto))) {
                unlink(public_path('upload/user_images/' . $user->nrcbackphoto));
            }

            $nrc_back_img_file = $request->file('nrcbackphoto');
            $nrc_back_img_name = uniqid() . '_' . time() . '.' . $nrc_back_img_file->getClientOriginalExtension();
            $nrc_back_img_file->move(public_path('/upload/user_images'), $nrc_back_img_name);

            $user_data['nrcbackphoto'] = $nrc_back_img_name;
        }

        if ($request->hasFile('householdphoto')) {
            if ($user->householdphoto && file_exists(public_path('upload/user_images/' . $user->householdphoto))) {
                unlink(public_path('upload/user_images/' . $user->householdphoto));
            }

            $household_img_file = $request->file('householdphoto');
            $household_img_name = uniqid() . '_' . time() . '.' . $household_img_file->getClientOriginalExtension();
            $household_img_file->move(public_path('/upload/user_images'), $household_img_name);

            $user_data['householdphoto'] = $household_img_name;
        }

        if ($request->hasFile('referenceletter')) {
            if ($user->referenceletter && file_exists(public_path('upload/user_images/' . $user->referenceletter))) {
                unlink(public_path('upload/user_images/' . $user->referenceletter));
            }

            $reference_letter_img_file = $request->file('referenceletter');
            $reference_letter_img_name = uniqid() . '_' . time() . '.' . $reference_letter_img_file->getClientOriginalExtension();
            $reference_letter_img_file->move(public_path('/upload/user_images'), $reference_letter_img_name);

            $user_data['referenceletter'] = $reference_letter_img_name;
        }

        if ($request->hasFile('photo')) {
            if ($user->photo && file_exists(public_path('upload/user_images/' . $user->photo))) {
                unlink(public_path('upload/user_images/' . $user->photo));
            }

            $user_img_file = $request->file('photo');
            $user_img_name = uniqid() . '_' . time() . '.' . $user_img_file->getClientOriginalExtension();
            $user_img_file->move(public_path('/upload/user_images'), $user_img_name);

            $user_data['photo'] = $user_img_name;
        }

        if ($request->hasFile('esingphoto')) {
            if ($user->esingphoto && file_exists(public_path('upload/user_images/' . $user->esingphoto))) {
                unlink(public_path('upload/user_images/' . $user->esingphoto));
            }

            $esign_img_file = $request->file('esingphoto');
            $esign_img_name = uniqid() . '_' . time() . '.' . $esign_img_file->getClientOriginalExtension();
            $esign_img_file->move(public_path('/upload/user_images'), $esign_img_name);

            $user_data['esingphoto'] = $esign_img_name;
        }

        $this->userService->update($id, $user_data);

        return redirect()->route('usermanage.index')
            ->with('message', 'Successfully updated')
            ->with('alert-type', 'success');
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id);

            return ResponseService::success([], 'Successfully deleted');
        } catch (Exception $e) {
            return ResponseService::fail($e->getMessage());
        }
    }
    

    public function toggleBlock($id)
    {
        $user = User::findOrFail($id);
        $user->is_block = !$user->is_block;
        $user->update();

        return response()->json([
            'status'   => 'success',
            'id'       => $user->id,
            'is_block' => $user->is_block,
            'message'  => $user->is_block
                ? 'User blocked successfully'
                : 'User unblocked successfully',
        ]);
    }
}
