<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];

        $data['total_users'] = User::count();
        $data['total_articles'] = Article::count();
        $data['total_categories'] = Category::count();
        $data['total_roles'] = Role::count();
        $data['total_perms'] = Permission::count();

        return view('admin.dashboard', compact('data'));
    }
}
