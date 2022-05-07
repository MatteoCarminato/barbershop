<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = City::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('city') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.city.list');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $states = State::all();
        $countries = Country::all();

        return view('admin.city.create', compact('states', 'countries'));
    }

    /**
     * @param CityStoreRequest $request
     * @return Response
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
     * @param Request $request
     * @param City $city
     * @return Response
     */
    public function show(Request $request, City $city)
    {

        return view('app.cities.show', compact('city'));
    }

    /**
     * @param Request $request
     * @param City $city
     * @return Response
     */
    public function edit(Request $request, City $city)
    {
        $states = State::pluck('name', 'id');

        return view('admin.ci.edit', compact('city', 'states'));
    }

    /**
     * @param CityUpdateRequest $request
     * @param City $city
     * @return Response
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
     * @param Request $request
     * @param City $city
     * @return Response
     */
    public function destroy(Request $request, City $city)
    {

        $city->delete();

        return redirect()
            ->route('city.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
