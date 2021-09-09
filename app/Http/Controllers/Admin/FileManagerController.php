<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FileManagerController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:file-manager', ['only' => ['index']]);

        $file_manager = Permission::get()->filter(function($item) {
            return $item->name == 'file-manager';
        })->first();

        if($file_manager == null) {
            Permission::create(['name'=>'file-manager']);
        }

	}
    public function index(Request $request)
	{
            return view('admin.file_manager.index');
	}
}
