<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use App\Models\FormPayment;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('country') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.country.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $request
     * @return Response
     */
    public function store(StoreCountryRequest $request)
    {
        Country::create($request->validated());
        return to_route('country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function show(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function edit(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $request
     * @param Country $country
     * @return Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        return to_route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
