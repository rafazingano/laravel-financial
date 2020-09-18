<?PHP

namespace ConfrariaWeb\Financial\Repositories;

use ConfrariaWeb\Financial\Models\Financial;
use ConfrariaWeb\Financial\Contracts\FinancialContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class FinancialRepository implements FinancialContract
{
    use RepositoryTrait;

    function __construct(Financial $financial)
    {
        $this->obj = $financial;
    }
}
