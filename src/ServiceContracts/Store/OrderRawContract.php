<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts\Store;

use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface OrderRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $orderID ID of order that needs to be fetched
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $orderID ID of the order that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
