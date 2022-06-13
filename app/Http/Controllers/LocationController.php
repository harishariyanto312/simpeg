<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $item_limit = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.locations') => ''
        ];

        return view('pages.locations.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'location');
        $params_order = $request->query('order', 'asc');

        $locations_total = Location::count();

        $rows = [];

        if ($params_sort == 'location') {
            $params_sort = 'location';
        }

        $locations = Location::orderBy($params_sort, $params_order);

        $locations_filtered = $locations->count();

        $locations = $locations->skip($params_offset)
            ->take($params_limit)
            ->get();
        
        foreach ($locations as $location) {
            $rows[] = [
                'location' => strtoupper($location->location),
                'menu' => view('pages.locations.row-menu', ['location' => $location])->render()
            ];
        }

        return [
            'total' => $locations_filtered,
            'totalNotFiltered' => $locations_total,
            'rows' => $rows
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.locations') => route('locations.index'),
            __('system.locations_create') => ''
        ];

        return view('pages.locations.create', compact('breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => ['required', 'max:64']
        ]);

        Location::create([
            'location' => $request->location
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('locations.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $breadcrumb = [
            __('system.admin_control_panel') => route('index'),
            __('system.locations') => route('locations.index'),
            __('system.locations_edit') => ''
        ];

        return view('pages.locations.edit', compact('breadcrumb', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'location' => ['required', 'max:64']
        ]);

        $location->update([
            'location' => $request->location
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('locations.edit', ['location' => $location]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Location $location)
    {
        $location->delete();
        $request->session()->flash('status', __('system.deleted'));
        return redirect()->back();
    }
}
