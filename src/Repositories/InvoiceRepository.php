<?PHP

namespace ConfrariaWeb\Financial\Repositories;

use ConfrariaWeb\Financial\Contracts\InvoiceContract;
use ConfrariaWeb\Financial\Models\Invoice;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class InvoiceRepository implements InvoiceContract
{
    use RepositoryTrait;

    function __construct(Invoice $invoice)
    {
        $this->obj = $invoice;
    }
}
