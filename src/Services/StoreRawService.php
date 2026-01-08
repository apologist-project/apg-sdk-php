<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Conversion\MapOf;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\StoreRawContract;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
final class StoreRawService implements StoreRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a map of status codes to quantities
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,int>>
     *
     * @throws APIException
     */
    public function listInventory(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'store/inventory',
            options: $requestOptions,
            convert: new MapOf('int'),
        );
    }
}
