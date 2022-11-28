<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\api\SalesInvoiceController;
use App\Http\Controllers\Api\StoreProductController;
use App\Http\Controllers\api\PurchaseInvoiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('customers', CustomerController::class);
Route::apiResource('inventories', InventoryController::class);
Route::apiResource('products', ProductController::class);


Route::apiResource('categories', CategoryController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::post('store_product', [\App\Http\Controllers\Api\StoreProductController::class, 'StoreProduct']);

Route::apiResource('invoices', InvoiceController::class);
Route::post('provide', [TransactionController::class, 'transaction']);

Route::put('full_payment/{id}', [\App\Http\Controllers\Api\InvoicePaymentController::class, 'fullPayment']);
Route::put('partial_payment/{id}', [\App\Http\Controllers\Api\InvoicePaymentController::class, 'partialPayment']);
Route::post('purchaseInvoice', [PurchaseInvoiceController::class, 'purchaseInvoice']);
Route::post('sellInvoice', [SalesInvoiceController::class, 'sellInvoice']);

// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
// });
Route::apiResource('users', UserController::class);
Route::apiResource('roles', RoleController::class);
//  ->middleware(
//     'permission:role-list|role-create|role-edit|role-delete',
//     ['only' => ['index', 'store']],
//     'permission:role-create',
//     ['only' => ['create', 'store']],
//     'permission:role-edit',
//     ['only' => ['edit', 'update']],
//     'permission:role-delete',
//     ['only' => ['destroy']]

// );
