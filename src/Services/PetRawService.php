<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Conversion\ListOf;
use Apologist\Core\Exceptions\APIException;
use Apologist\Pet\Pet;
use Apologist\Pet\PetCreateParams;
use Apologist\Pet\PetCreateParams\Status;
use Apologist\Pet\PetFindByStatusParams;
use Apologist\Pet\PetFindByTagsParams;
use Apologist\Pet\PetUpdateParams;
use Apologist\Pet\PetUpdateWithFormParams;
use Apologist\Pet\PetUploadImageParams;
use Apologist\Pet\PetUploadImageResponse;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\PetRawContract;

final class PetRawService implements PetRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new pet to the store
     *
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: array{id?: int, name?: string},
     *   status?: 'available'|'pending'|'sold'|Status,
     *   tags?: list<array{id?: int, name?: string}>,
     * }|PetCreateParams $params
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function create(
        array|PetCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PetCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'pet',
            body: (object) $parsed,
            options: $options,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * Returns a single pet
     *
     * @param int $petID ID of pet to return
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['pet/%1$s', $petID],
            options: $requestOptions,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * Update an existing pet by Id
     *
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: array{id?: int, name?: string},
     *   status?: 'available'|'pending'|'sold'|PetUpdateParams\Status,
     *   tags?: list<array{id?: int, name?: string}>,
     * }|PetUpdateParams $params
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function update(
        array|PetUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PetUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'pet',
            body: (object) $parsed,
            options: $options,
            convert: Pet::class,
        );
    }

    /**
     * @api
     *
     * delete a pet
     *
     * @param int $petID Pet id to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['pet/%1$s', $petID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Multiple status values can be provided with comma separated strings
     *
     * @param array{
     *   status?: 'available'|'pending'|'sold'|PetFindByStatusParams\Status,
     * }|PetFindByStatusParams $params
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByStatus(
        array|PetFindByStatusParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PetFindByStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pet/findByStatus',
            query: $parsed,
            options: $options,
            convert: new ListOf(Pet::class),
        );
    }

    /**
     * @api
     *
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
     *
     * @param array{tags?: list<string>}|PetFindByTagsParams $params
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByTags(
        array|PetFindByTagsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PetFindByTagsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pet/findByTags',
            query: $parsed,
            options: $options,
            convert: new ListOf(Pet::class),
        );
    }

    /**
     * @api
     *
     * Updates a pet in the store with form data
     *
     * @param int $petID ID of pet that needs to be updated
     * @param array{name?: string, status?: string}|PetUpdateWithFormParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        array|PetUpdateWithFormParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetUpdateWithFormParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['pet/%1$s', $petID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * uploads an image
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param array{additionalMetadata?: string}|PetUploadImageParams $params
     *
     * @return BaseResponse<PetUploadImageResponse>
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        array|PetUploadImageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PetUploadImageParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['pet/%1$s/uploadImage', $petID],
            query: array_diff_key($parsed, ['body']),
            headers: ['Content-Type' => 'application/octet-stream'],
            body: $parsed,
            options: $options,
            convert: PetUploadImageResponse::class,
        );
    }
}
