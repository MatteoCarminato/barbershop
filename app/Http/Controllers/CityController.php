<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = City::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('state') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.city.list');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $states = State::all();
        $countries = Country::all();

        return view('admin.city.create', compact('states','countries'));
    }

    /**
     * @param \App\Http\Requests\CityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {

        $validated = $request->validated();

        $city = City::create($validated);

        return redirect()
            ->route('city.index')
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, City $city)
    {

        return view('app.cities.show', compact('city'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, City $city)
    {
        $states = State::pluck('name', 'id');

        return view('admin.ci.edit', compact('city', 'states'));
    }

    /**
     * @param \App\Http\Requests\CityUpdateRequest $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityUpdateRequest $request, City $city)
    {

        $validated = $request->validated();

        $city->update($validated);

        return redirect()
            ->route('city.edit', $city)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, City $city)
    {

        $city->delete();

        return redirect()
            ->route('city.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
