<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;

interface StoreContract
{
    /**
     * @api
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(
        ?RequestOptions $requestOptions = null
    ): array;
}
