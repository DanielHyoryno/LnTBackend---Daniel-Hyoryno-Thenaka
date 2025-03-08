<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Invoice;

class AdminController extends Controller
{
    public function dashboard(){
        $total_products = Product::count();
        $total_users = User::count();
        $total_invoices = Invoice::count();


        return view('admin.dashboard', compact('total_products', 'total_users', 'total_invoices'));
    }
}
