<?php

namespace ConfrariaWeb\Financial\Controllers;

use ConfrariaWeb\Financial\Requests\StoreFinancialPaymentMethodUser;
use ConfrariaWeb\Financial\Requests\UpdateFinancialPaymentMethodUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodUserController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables()
    {
        $PaymentMethodUsers = resolve('PaymentMethodUserService')->all();
        return DataTables::of($PaymentMethodUsers)
            ->editColumn('payment_method', function ($PaymentMethodUser) {
                return $PaymentMethodUser->paymentMethod->name;
            })
            ->editColumn('status', function ($PaymentMethodUser) {
                return $PaymentMethodUser->status ? __('templateDashboardArgon::dashboard.activated') : __('templateDashboardArgon::dashboard.disabled');
            })
            ->addColumn('action', function ($PaymentMethodUser) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                <a href="'.route('admin.payment-method-users.show', $PaymentMethodUser->id).'" class="btn btn-info">
                    <i class="glyphicon glyphicon-eye"></i> Ver
                </a>
                <a href="'.route('admin.payment-method-users.edit', $PaymentMethodUser->id).'" class="btn btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Editar
                </a>
                <a class="btn btn-danger" href="'.route('admin.payment-method-users.destroy', $PaymentMethodUser->id).'" onclick="event.preventDefault();
                    document.getElementById(\'payment-method-users-destroy-form-' . $PaymentMethodUser->id . '\').submit();">
                    Deletar
                </a>
                <form id="payment-method-users-destroy-form-' . $PaymentMethodUser->id . '" action="'.route('admin.payment-method-users.destroy', $PaymentMethodUser->id).'" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="'. csrf_token() .'">
                    <input type="hidden" name="id" value="'.$PaymentMethodUser->id.'">
                </form>
            </div>';
            })
            ->make();
    }

    public function index()
    {
        return view(Config::get('cw_financial.views') . 'payment-method-users.index');
    }

    public function create()
    {
        return view(Config::get('cw_financial.views') . 'payment-method-users.create');
    }

    public function store(StoreFinancialPaymentMethodUser $request)
    {
        $r = resolve('PaymentMethodUserService')->create($request->all());
        return redirect()
            ->route('admin.payment-method-users.index')
            ->with('status', 'Realizado com sucesso');
    }

    public function show($id)
    {
        $this->data['invoice'] = resolve('InvoiceService')->find($id);
        return view(Config::get('cw_financial.views') . 'invoices.show', $this->data);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateFinancialPaymentMethodUser $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
