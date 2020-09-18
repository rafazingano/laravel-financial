<?PHP

namespace ConfrariaWeb\Financial\Repositories;

use ConfrariaWeb\Financial\Contracts\PaymentMethodUserContract;
use ConfrariaWeb\Financial\Models\PaymentMethodUser;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PaymentMethodUserRepository implements PaymentMethodUserContract
{
    use RepositoryTrait;

    function __construct(PaymentMethodUser $paymentMethodUser)
    {
        $this->obj = $paymentMethodUser;
    }
}
