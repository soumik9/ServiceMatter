<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        $scategories = ServiceCategory::where('status', 1)->inRandomOrder()->take(18)->get();
        $featured_services = Service::where('featured', 1)->inRandomOrder()->take(4)->get();
        $featured_categories = ServiceCategory::where('featured', 1)->where('status', 1)->take(8)->get();

        $sid = ServiceCategory::whereIn('slug', ['ac','tv','refrigerator','geyser','water-purifier'])->get()->pluck('id');
        $appliance_services = Service::whereIn('service_category_id', $sid)->inRandomOrder()->take(4)->get();

        $service_categories = ServiceCategory::where('status', 1)->get();
        $employees = User::where('utype', 'SVP')->where('status', 1)->take(4)->get();

        $slides = Slider::where('status', 1)->get();

        return view('frontend.index', compact('scategories', 'featured_services', 'featured_categories', 'sid', 'appliance_services', 'slides', 'employees', 'service_categories'));
    }

    public function serviceCategories()
    {
        $scategories = ServiceCategory::where('status', 1)->get();
        return view('frontend.service_categories', compact('scategories'));
    }

    public function servicesByCategory($slug)
    {
        $scategory = ServiceCategory::where('slug', $slug)->first();
        return view('frontend.service_by_category', compact('scategory'));
    }

    public function servicesDetails($slug)
    {
        $service   = Service::where('slug', $slug)->first();
        $r_service = Service::where('service_category_id', $service->service_category_id)->where('slug', '!=', $slug)->inRandomOrder()->first();

        return view('frontend.service_details', compact('service', 'r_service'));
    }

    public function autocomplete(Request $request)
    {
        $data = Service::select('name')->where("name","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchService(Request $request)
    {
        $service_slug = Str::slug($request->q, '-');

        if($service_slug)
        {
            return redirect('/service-details/'.$service_slug);
        }else
        {
            return back();
        }
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('frontend.reviews', compact('reviews'));
    }
}
