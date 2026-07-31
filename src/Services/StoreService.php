<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\StoreContract;
use Apologist\Services\Store\OrderService;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,int>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listInventory(requestOptions: $requestOptions);

        return $response->parse();
    }
}
