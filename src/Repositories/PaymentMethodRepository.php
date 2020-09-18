<?PHP

namespace ConfrariaWeb\Financial\Repositories;

use ConfrariaWeb\Financial\Contracts\PaymentMethodContract;
use ConfrariaWeb\Financial\Models\PaymentMethod;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PaymentMethodRepository implements PaymentMethodContract
{
    use RepositoryTrait;

    function __construct(PaymentMethod $paymentMethod)
    {
        $this->obj = $paymentMethod;
    }
}
