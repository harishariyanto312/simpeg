<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
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
            __('system.titles') => ''
        ];

        return view('pages.titles.index', compact('breadcrumb'));
    }

    public function jsonIndex(Request $request)
    {
        $params_offset = $request->query('offset', 0);
        $params_limit = $request->query('limit', $this->item_limit);
        $params_sort = $request->query('sort', 'title');
        $params_order = $request->query('order', 'asc');

        $titles_total = Title::count();

        $rows = [];

        if ($params_sort == 'title') {
            $params_sort = 'title';
        }

        $titles = Title::orderBy($params_sort, $params_order);

        $titles_filtered = $titles->count();

        $titles = $titles->skip($params_offset)
            ->take($params_limit)
            ->get();

        foreach ($titles as $title) {
            $rows[] = [
                'title' => $title->title,
                'menu' => ''
            ];
        }

        return [
            'total' => $titles_filtered,
            'totalNotFiltered' => $titles_total,
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
            __('system.titles') => route('titles.index'),
            __('system.titles_create') => ''
        ];

        return view('pages.titles.create', compact('breadcrumb'));
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
            'title' => ['required', 'max:32']
        ]);

        Title::create([
            'title' => $request->title
        ]);

        $request->session()->flash('status', __('system.saved'));

        return redirect()->route('titles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        //
    }
}
