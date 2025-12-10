<?php

declare(strict_types=1);

namespace Apologist\Pet;

use Apologist\Core\Attributes\Optional;
use Apologist\Core\Concerns\SdkModel;
use Apologist\Core\Concerns\SdkParams;
use Apologist\Core\Contracts\BaseModel;

/**
 * uploads an image.
 *
 * @see Apologist\Services\PetService::uploadImage()
 *
 * @phpstan-type PetUploadImageParamsShape = array{additionalMetadata?: string}
 */
final class PetUploadImageParams implements BaseModel
{
    /** @use SdkModel<PetUploadImageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Additional Metadata.
     */
    #[Optional]
    public ?string $additionalMetadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $additionalMetadata = null): self
    {
        $self = new self;

        null !== $additionalMetadata && $self['additionalMetadata'] = $additionalMetadata;

        return $self;
    }

    /**
     * Additional Metadata.
     */
    public function withAdditionalMetadata(string $additionalMetadata): self
    {
        $self = clone $this;
        $self['additionalMetadata'] = $additionalMetadata;

        return $self;
    }
}
