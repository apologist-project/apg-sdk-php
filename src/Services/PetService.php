<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Exceptions\APIException;
use Apologist\Core\Util;
use Apologist\Pet\Pet;
use Apologist\Pet\PetCreateParams\Status;
use Apologist\Pet\PetUploadImageResponse;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\PetContract;

final class PetService implements PetContract
{
    /**
     * @api
     */
    public PetRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PetRawService($client);
    }

    /**
     * @api
     *
     * Add a new pet to the store
     *
     * @param list<string> $photoURLs
     * @param array{id?: int, name?: string} $category
     * @param 'available'|'pending'|'sold'|Status $status pet status in the store
     * @param list<array{id?: int, name?: string}> $tags
     *
     * @throws APIException
     */
    public function create(
        string $name,
        array $photoURLs,
        ?int $id = null,
        ?array $category = null,
        string|Status|null $status = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): Pet {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'photoURLs' => $photoURLs,
                'id' => $id,
                'category' => $category,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a single pet
     *
     * @param int $petID ID of pet to return
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): Pet {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($petID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing pet by Id
     *
     * @param list<string> $photoURLs
     * @param array{id?: int, name?: string} $category
     * @param 'available'|'pending'|'sold'|\Apologist\Pet\PetUpdateParams\Status $status pet status in the store
     * @param list<array{id?: int, name?: string}> $tags
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array $photoURLs,
        ?int $id = null,
        ?array $category = null,
        string|\Apologist\Pet\PetUpdateParams\Status|null $status = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): Pet {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'photoURLs' => $photoURLs,
                'id' => $id,
                'category' => $category,
                'status' => $status,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * delete a pet
     *
     * @param int $petID Pet id to delete
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($petID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Multiple status values can be provided with comma separated strings
     *
     * @param 'available'|'pending'|'sold'|\Apologist\Pet\PetFindByStatusParams\Status $status Status values that need to be considered for filter
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByStatus(
        string|\Apologist\Pet\PetFindByStatusParams\Status $status = 'available',
        ?RequestOptions $requestOptions = null,
    ): array {
        $params = Util::removeNulls(['status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->findByStatus(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
     *
     * @param list<string> $tags Tags to filter by
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByTags(
        ?array $tags = null,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = Util::removeNulls(['tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->findByTags(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a pet in the store with form data
     *
     * @param int $petID ID of pet that needs to be updated
     * @param string $name Name of pet that needs to be updated
     * @param string $status Status of pet that needs to be updated
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        ?string $name = null,
        ?string $status = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['name' => $name, 'status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateWithForm($petID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * uploads an image
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param string $additionalMetadata Query param: Additional Metadata
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        ?string $additionalMetadata = null,
        ?RequestOptions $requestOptions = null,
    ): PetUploadImageResponse {
        $params = Util::removeNulls(['additionalMetadata' => $additionalMetadata]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadImage($petID, $body, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
