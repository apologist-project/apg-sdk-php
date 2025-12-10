<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts\Store;

use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams\Status;

interface OrderContract
{
    /**
     * @api
     *
     * @param 'placed'|'approved'|'delivered'|Status $status Order Status
     *
     * @throws APIException
     */
    public function create(
        ?int $id = null,
        ?bool $complete = null,
        ?int $petID = null,
        ?int $quantity = null,
        string|\DateTimeInterface|null $shipDate = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of order that needs to be fetched
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of the order that needs to be deleted
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
