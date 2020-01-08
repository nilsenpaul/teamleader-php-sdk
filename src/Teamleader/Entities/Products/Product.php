<?php

namespace Teamleader\Entities\Products;

use Teamleader\Actions\FindAll;
use Teamleader\Actions\FindById;
use Teamleader\Actions\Storable;
use Teamleader\Model;

class Product extends Model
{
    use Storable;
    use FindAll;
    use FindById;

    const TYPE = 'product';

    protected $fillable = [
        'id',
        'name',
        'code',
        'vat',
        'purchase_price', // { "amount": 123.4, "currency": "EUR" }
        'selling_price', // { "amount": 123.4, "currency": "EUR" }
    ];

    /**
     * @var string
     */
    protected $endpoint = 'products';

    /**
     * @return mixed
     */
    public function insert()
    {
        $result = $this->connection()->post($this->getEndpoint() . '.add', $this->jsonWithNamespace());

        return $this->selfFromResponse($result);
    }
}
