<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts\Store;

use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams;

interface OrderRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OrderCreateParams $params
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $orderID ID of order that needs to be fetched
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $orderID ID of the order that needs to be deleted
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
