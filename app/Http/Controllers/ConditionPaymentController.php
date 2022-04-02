<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConditionPaymentRequest;
use App\Http\Requests\UpdateConditionPaymentRequest;
use App\Models\ConditionPayment;
use App\Models\FormPayment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class ConditionPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ConditionPayment::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('conditionpayment') . '/' . $row->id . '" class="edit btn btn-primary btn-sm"> <i class="fas fa-search-plus"></i> Detalhes</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.condition_payment.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $forms_payment = FormPayment::all();
        return view('admin.condition_payment.create', compact('forms_payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConditionPaymentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreConditionPaymentRequest $request)
    {
        dd($request->all());
        ConditionPayment::create($request->validated());
        return to_route('conditionpayment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param ConditionPayment $conditionpayment
     * @return Application|Factory|View
     */
    public function show(ConditionPayment $conditionpayment)
    {
        return view('admin.condition_payment.edit', compact('conditionpayment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ConditionPayment $conditionpayment
     * @return Application|Factory|View
     */
    public function edit(ConditionPayment $conditionpayment)
    {
        return view('admin.condition_payment.edit', compact('conditionpayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConditionPaymentRequest $request
     * @param ConditionPayment $conditionpayment
     * @return RedirectResponse
     */
    public function update(UpdateConditionPaymentRequest $request, ConditionPayment $conditionpayment)
    {
        $conditionpayment->update($request->validated());
        return to_route('conditionpayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ConditionPayment $conditionpayment
     * @return Response
     */
    public function destroy(ConditionPayment $conditionpayment)
    {
        //
    }
}
