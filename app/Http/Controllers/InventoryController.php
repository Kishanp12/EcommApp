<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Inventory;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request) {

        $inventories = auth()->user()->inventories();

        if ($request->has('search')) {
            $inventories->where('sku', $request->search)->orWhere('product_id', $request->search);
        }

        $inventories = $inventories->with('product:id,product_name')->paginate();

        return view('inventory.show', ['inventories' => $inventories]);
    }

    //Realationship error, not saving to varible Inventories trying to display relationship aka query not running
    // Symfony\Component\HttpFoundation\Response::setContent(): Argument #1 ($content) must be of type ?string, Illuminate\Database\Eloquent\Relations\HasManyThrough given, called in /var/www/html/vendor/laravel/framework/src/Illuminate/Http/Response.php on line 72
}
