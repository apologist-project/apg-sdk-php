<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\StoreContract;
use Apologist\Services\Store\OrderService;

final class StoreService implements StoreContract
{
    /**
     * @api
     */
    public StoreRawService $raw;

    /**
     * @api
     */
    public OrderService $order;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StoreRawService($client);
        $this->order = new OrderService($client);
    }

    /**
     * @api
     *
     * Returns a map of status codes to quantities
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(?RequestOptions $requestOptions = null): array
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listInventory(requestOptions: $requestOptions);

        return $response->parse();
    }
}
