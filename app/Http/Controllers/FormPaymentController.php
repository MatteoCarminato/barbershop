<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormPaymentRequest;
use App\Http\Requests\UpdateFormPaymentRequest;
use App\Models\FormPayment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class FormPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FormPayment::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('formpayment') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.form_payment.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.form_payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFormPaymentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFormPaymentRequest $request)
    {
        FormPayment::create($request->validated());
        return to_route('formpayment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param FormPayment $formpayment
     * @return Application|Factory|View
     */
    public function show(FormPayment $formpayment)
    {
        return view('admin.form_payment.edit', compact('formpayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FormPayment $formpayment
     * @return Application|Factory|View
     */
    public function edit(FormPayment $formpayment)
    {
        return view('admin.form_payment.edit', compact('formpayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFormPaymentRequest $request
     * @param FormPayment $formpayment
     * @return RedirectResponse
     */
    public function update(UpdateFormPaymentRequest $request, FormPayment $formpayment)
    {
        $formpayment->update($request->validated());
        return to_route('formpayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FormPayment $formpayment
     * @return Response
     */
    public function destroy(FormPayment $formpayment)
    {
        //
    }

    public function getAll(){
        return FormPayment::all();
    }

}
