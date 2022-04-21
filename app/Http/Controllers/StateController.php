<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = State::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('state') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.state.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::paginate(5);
        return view('admin.state.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStateRequest $request
     * @return Response
     */
    public function store(StoreStateRequest $request)
    {
        State::create($request->validated());
        return to_route('admin.state.index');
    }

    /**
     * Display the specified resource.
     *
     * @param State $state
     * @return Response
     */
    public function show(State $state)
    {
        return view('admin.states.edit', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param State $state
     * @return Response
     */
    public function edit(State $state)
    {
        $countries = Country::pluck('name', 'id');

        return view('admin.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStateRequest $request
     * @param State $state
     * @return Response
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        $state->update($request->validated());
        return to_route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return to_route('admin.state.index');
    }
}
