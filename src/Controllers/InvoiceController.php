<?php

namespace ConfrariaWeb\Financial\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{

    protected $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function datatables()
    {
        $invoices = resolve('InvoiceService')->all();
        return DataTables::of($invoices)
            ->editColumn('due_date', function ($invoice) {
                return $invoice->due_date ? $invoice->due_date->format('d/m/Y') : NULL;
            })
            ->editColumn('pay_day', function ($invoice) {
                return $invoice->pay_day ? $invoice->pay_day->format('d/m/Y') : __('templateDashboardArgon::dashboard.financials.not_found');
            })
            ->addColumn('action', function ($invoice) {
                return '<div class="btn-group btn-group-sm float-right" role="group">
                <a href="'.route('admin.invoices.show', $invoice->id).'" class="btn btn-info">
                    <i class="glyphicon glyphicon-eye"></i> Ver
                </a>
                <a href="'.route('admin.invoices.edit', $invoice->id).'" class="btn btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Editar
                </a>
                <a class="btn btn-danger" href="'.route('admin.invoices.destroy', $invoice->id).'" onclick="event.preventDefault();
                    document.getElementById(\'invoices-destroy-form-' . $invoice->id . '\').submit();">
                    Deletar
                </a>
                <form id="invoices-destroy-form-' . $invoice->id . '" action="'.route('admin.invoices.destroy', $invoice->id).'" method="POST" style="display: none;">
                    <input name="_method" type="hidden" value="DELETE">    
                    <input name="_token" type="hidden" value="'. csrf_token() .'">
                    <input type="hidden" name="id" value="'.$invoice->id.'">
                </form>
            </div>';
            })
            ->make();
    }

    public function index()
    {
        return view(cwView('invoices.index', true));
    }

    public function create()
    {
        //
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
