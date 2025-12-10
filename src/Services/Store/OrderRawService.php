<?php

declare(strict_types=1);

namespace Apologist\Services\Store;

use Apologist\Client;
use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\Store\OrderRawContract;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams;
use Apologist\Store\Order\OrderCreateParams\Status;

final class OrderRawService implements OrderRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Place a new order in the store
     *
     * @param array{
     *   id?: int,
     *   complete?: bool,
     *   petID?: int,
     *   quantity?: int,
     *   shipDate?: string|\DateTimeInterface,
     *   status?: 'placed'|'approved'|'delivered'|Status,
     * }|OrderCreateParams $params
     *
     * @return BaseResponse<Order>
     *
     * @throws APIException
     */
    public function create(
        array|OrderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = OrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'store/order',
            body: (object) $parsed,
            options: $options,
            convert: Order::class,
        );
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
            convert: Order::class,
        );
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
            convert: null,
        );
    }
}
