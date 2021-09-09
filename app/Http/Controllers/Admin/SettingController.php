<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:websetting-edit', ['only' => ['edit','update']]);

        $websetting_edit = Permission::get()->filter(function($item) {
            return $item->name == 'websetting-edit';
        })->first();

        if ($websetting_edit == null) {
            Permission::create(['name'=>'websetting-edit']);
        }
	}

    public function edit()
    {
        $setting = Setting::find(1);
        $currencies = Currency::all();
        return view('admin.settings.edit', compact('setting','currencies'));
    }

    public function update(Request $request, $id=1)
    {
        $rules = [
            'website_title' 			=> 'nullable|string',
            'website_logo_dark'         => 'nullable|string',
            'website_logo_light'        => 'nullable|string',
            'website_logo_small'        => 'nullable|string',
            'website_favicon'           => 'nullable|string',
            'meta_title'                => 'nullable|string',
            'meta_description'          => 'nullable|string',
            'meta_tag'                  => 'nullable|string',
            'currency'                  => 'nullable|string',
            'address'                   => 'nullable|string',
            'phone'                     => 'nullable|string',
            'email'                     => 'nullable|string',
        ];

        $messages = [
           //'name.required'    		=> __('default.form.validation.name.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = $request->all();

		$setting = Setting::find($id);

        if (empty($input['website_logo_dark'])) {
            $input['website_logo_dark'] = $setting->website_logo_dark;
        }
        if (empty($input['website_logo_light'])) {
            $input['website_logo_light'] = $setting->website_logo_light;
        }
        if (empty($input['website_logo_small'])) {
            $input['website_logo_small'] = $setting->website_logo_small;
        }
        if (empty($input['website_favicon'])) {
            $input['website_favicon'] = $setting->website_favicon;
        }

		try {
			$setting->update($input);
            Toastr::success(__('setting.message.update.success'));
		    return redirect()->route('settings.website.edit');
		} catch (Exception $e) {
            Toastr::success(__('setting.message.update.error'));
		    return redirect()->route('settings.website.edit');
		}
    }
}
