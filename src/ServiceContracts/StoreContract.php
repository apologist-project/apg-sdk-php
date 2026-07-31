<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface StoreContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): array;
}
