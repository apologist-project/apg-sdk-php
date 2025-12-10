<?php

declare(strict_types=1);

namespace Apologist\Services\Store;

use Apologist\Client;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\Store\OrderContract;
use Apologist\Store\Order\Order;
use Apologist\Store\Order\OrderCreateParams\Status;

final class OrderService implements OrderContract
{
    /**
     * @api
     */
    public OrderRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OrderRawService($client);
    }

    /**
     * @api
     *
     * Place a new order in the store
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
    ): Order {
        $params = [
            'id' => $id,
            'complete' => $complete,
            'petID' => $petID,
            'quantity' => $quantity,
            'shipDate' => $shipDate,
            'status' => $status,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.
     *
     * @param int $orderID ID of order that needs to be fetched
     *
     * @throws APIException
     */
    public function retrieve(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): Order {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors
     *
     * @param int $orderID ID of the order that needs to be deleted
     *
     * @throws APIException
     */
    public function delete(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
