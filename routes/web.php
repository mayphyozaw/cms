<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Backend\ClientManagement\ClientController;
use App\Http\Controllers\Backend\Configuration\PermissionController;
use App\Http\Controllers\Backend\Configuration\RoleController;
use App\Http\Controllers\Backend\MaterialManagement\AssetController;
use App\Http\Controllers\Backend\MaterialManagement\FixedAssets\CategoryController;
use App\Http\Controllers\Backend\MaterialManagement\FixedAssets\FixedAssetsController;
use App\Http\Controllers\Backend\MaterialManagement\VariableAssets\VariableAssetsController;
use App\Http\Controllers\Backend\MaterialManagement\VariableAssets\VariableCategoryController;
use App\Http\Controllers\Backend\ProjectManagement\ProjectCategoryController;
use App\Http\Controllers\Backend\ProjectManagement\ProjectController;
use App\Http\Controllers\Backend\ProjectManagement\ProjectFilesController;
use App\Http\Controllers\Backend\ProjectManagement\WorkscopeController;
use App\Http\Controllers\Backend\StockManagement\StockController;
use App\Http\Controllers\Backend\StockManagement\StockMovementController;
use App\Http\Controllers\Backend\StockManagement\WarehouseController;
use App\Http\Controllers\Backend\StockManagement\WarehouseStockController;
use App\Http\Controllers\Backend\SupplierManagement\SupplierController;
use App\Http\Controllers\Backend\UserManagement\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\UserManagement\Resign;
use App\Http\Controllers\Backend\UserManagement\ResignController;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'notBlocked'])->name('dashboard');



// Route::middleware(['auth', 'notBlocked'])->group(function () {

//     Route::resource('usermanage', UserManageController::class);
// });

Route::get('admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');

require __DIR__ . '/auth.php';

Route::middleware('auth', 'notBlocked')->group(function () {

    Route::resource('usermanage', UserController::class)->except(['show']);
    Route::get('user-datatable', [UserController::class, 'userDataTable'])->name('user-datatable');

    Route::post('/usermanage/resign-submit', [UserController::class, 'resignSubmit'])->name('usermanage.resign.submit');
    Route::post('/usermanage/block/{id}', [UserController::class, 'blockUser'])->name('usermanage.block');
    Route::post('/usermanage/unblock/{id}', [UserController::class, 'unblockUser'])->name('usermanage.unblock');

    Route::post('/usermanage/toggle-block/{id}', [UserController::class, 'toggleBlock'])->name('usermanage.toggle-block');;

    Route::resource('resign-employees', ResignController::class);
    Route::get('resign-employee-datatable', [ResignController::class, 'resignEmployeeDataTable'])->name('resign-employee-datatable');
    Route::post('confirm/resign', [ResignController::class, 'confirm_resign'])->name('confirm_resign');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/change-password', [PasswordController::class, 'edit'])->name('change-password.edit');
    Route::put('/change-password', [PasswordController::class, 'update'])->name('change-password.update');


    Route::resource('client', ClientController::class);
    Route::get('client-datatable', [ClientController::class, 'clientDataTable'])->name('client-datatable');


    Route::resource('warehouse', WarehouseController::class);
    Route::get('warehouse-datatable', [WarehouseController::class, 'warehouseDataTable'])->name('warehouse-datatable');

    Route::resource('warehouse-stocks', WarehouseStockController::class)->only(['index']);
    Route::resource('stock-movements', StockMovementController::class);




    Route::prefix('suppliermanage')->name('suppliermanage.')->group(function () {
        Route::resource('supplier', SupplierController::class);
        Route::get('/supplier-datatable', [SupplierController::class, 'supplierDataTable'])->name('supplier-datatable');
    });






    Route::prefix('material')->name('material.')->group(function () {

        Route::resource('assets', AssetController::class);
        Route::get('assets-datatable', [AssetController::class, 'assetsDataTable'])->name('assets-datatable');
        Route::get('get-assets-by-type', [AssetController::class, 'getAssetsByType'])->name('get-assets-by-type');
        Route::get('get-asset-detail', [AssetController::class, 'getAssetDetail'])->name('get-asset-detail');
         Route::post('assets/purchase', [AssetController::class], 'purchaseAssets')->name('assets.purchase');


        Route::resource('fixedassets', FixedAssetsController::class);
        Route::get('fixedassets-datatable', [FixedAssetsController::class, 'fixedassetsDataTable'])->name('fixedassets-datatable');
        Route::post('fixedassets/purchase', [FixedAssetsController::class], 'purchaseFixedAssets')->name('fixedassets.purchase');


        Route::resource('category', CategoryController::class)->names('category');
        Route::post('confirm/update', [CategoryController::class, 'confirm_update'])->name('confirm_update');
        Route::get('category-datatable', [CategoryController::class, 'categoryDataTable'])->name('category-datatable');


        Route::resource('variableassets', VariableAssetsController::class);
        Route::get('variableassets-datatable', [VariableAssetsController::class, 'variableassetsDataTable'])->name('variableassets-datatable');

        Route::resource('variable-category', VariableCategoryController::class)->names('variable-category');
        Route::post('confirm/update', [VariableCategoryController::class, 'confirm_update'])->name('confirm_update');
        Route::get('variable-category-datatable', [VariableCategoryController::class, 'variablecategoryDataTable'])->name('variable-category-datatable');
    });

    Route::prefix('projectmanage')->name('projectmanage.')->group(function () {
        Route::resource('projects', ProjectController::class);
        Route::get('/clients', [ProjectController::class, 'getClient'])->name('clients_get');
        Route::get('/load/projects', [ProjectController::class, 'load_projects'])->name('load_projects');
        Route::get('project-datatable', [ProjectController::class, 'projectDataTable'])->name('project-datatable');


        Route::resource('projectfiles', ProjectFilesController::class)->only('index', 'store', 'edit', 'update');
        Route::get('/project/files', [ProjectFilesController::class, 'get_project_files'])->name('get_project_files');
        Route::get('/project/files/view', [ProjectFilesController::class, 'get_project_files_with_view'])->name('get_project_files_with_view');
        Route::get('/project/file', [ProjectFilesController::class, 'destroy'])->name('project_file_delete');

        Route::resource('projectcategory', ProjectCategoryController::class);
        Route::get('projectcategory-datatable', [ProjectCategoryController::class, 'projectCategoryDataTable'])->name('projectcategory-datatable');

        Route::resource('workscope', WorkscopeController::class);
        Route::get('workscope-datatable', [WorkscopeController::class, 'workscopeDataTable'])->name('workscope-datatable');
    });

    Route::prefix('configuration')->name('configuration.')->group(function () {
        Route::resource('role', RoleController::class);
        Route::get('/role-datatable', [RoleController::class, 'roleDataTable'])->name('role-datatable');

        Route::resource('permission', PermissionController::class);
        Route::get('/permission-datatable', [PermissionController::class, 'permissionDataTable'])->name('permission-datatable');
    });
});
