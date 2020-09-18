<?php

namespace ConfrariaWeb\Financial\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethodController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables()
    {
        $paymentMethods = resolve('PaymentMethodService')->all();
        return DataTables::of($paymentMethods)
            ->editColumn('status', function ($paymentMethod) {
                return $paymentMethod->status ? __('templateDashboardArgon::admin.activated') : __('templateDashboardArgon::admin.disabled');
            })
            ->addColumn('action', function ($paymentMethod) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                <a href="'.route('admin.payment-methods.show', $paymentMethod->id).'" class="btn btn-info">
                    <i class="glyphicon glyphicon-eye"></i> Ver
                </a>
                <a href="'.route('admin.payment-methods.edit', $paymentMethod->id).'" class="btn btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Editar
                </a>
                <a class="btn btn-danger" href="'.route('admin.payment-methods.destroy', $paymentMethod->id).'" onclick="event.preventDefault();
                    document.getElementById(\'payment-methods-destroy-form-' . $paymentMethod->id . '\').submit();">
                    Deletar
                </a>
                <form id="payment-methods-destroy-form-' . $paymentMethod->id . '" action="'.route('admin.payment-methods.destroy', $paymentMethod->id).'" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="'. csrf_token() .'">
                    <input type="hidden" name="id" value="'.$paymentMethod->id.'">
                </form>
            </div>';
            })
            ->make();
    }

    public function index()
    {
        return view(Config::get('cw_financial.views') . 'payment-methods.index');
    }

    public function create()
    {
        return view(Config::get('cw_financial.views') . 'payment-methods.create');
    }

    public function store(Request $request)
    {
        //
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

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
