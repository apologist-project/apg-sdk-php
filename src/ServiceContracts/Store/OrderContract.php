<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts\Store;

use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams\Status;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface OrderContract
{
    /**
     * @api
     *
     * @param Status|value-of<Status> $status Order Status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?int $id = null,
        ?bool $complete = null,
        ?int $petID = null,
        ?int $quantity = null,
        ?\DateTimeInterface $shipDate = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of order that needs to be fetched
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): Order;

    /**
     * @api
     *
     * @param int $orderID ID of the order that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
