<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;

interface StoreRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<array<string,int>>
     *
     * @throws APIException
     */
    public function listInventory(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
