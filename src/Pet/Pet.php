<?php

declare(strict_types=1);

namespace Apologist\Pet;

use Apologist\Core\Attributes\Optional;
use Apologist\Core\Attributes\Required;
use Apologist\Core\Concerns\SdkModel;
use Apologist\Core\Contracts\BaseModel;
use Apologist\Pet\Pet\Category;
use Apologist\Pet\Pet\Status;
use Apologist\Pet\Pet\Tag;

/**
 * @phpstan-import-type CategoryShape from \Apologist\Pet\Pet\Category
 * @phpstan-import-type TagShape from \Apologist\Pet\Pet\Tag
 *
 * @phpstan-type PetShape = array{
 *   name: string,
 *   photoURLs: list<string>,
 *   id?: int|null,
 *   category?: null|Category|CategoryShape,
 *   status?: null|Status|value-of<Status>,
 *   tags?: list<Tag|TagShape>|null,
 * }
 */
final class Pet implements BaseModel
{
    /** @use SdkModel<PetShape> */
    use SdkModel;

    #[Required]
    public string $name;

    /** @var list<string> $photoURLs */
    #[Required('photoUrls', list: 'string')]
    public array $photoURLs;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?Category $category;

    /**
     * pet status in the store.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<Tag>|null $tags */
    #[Optional(list: Tag::class)]
    public ?array $tags;

    /**
     * `new Pet()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Pet::with(name: ..., photoURLs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Pet)->withName(...)->withPhotoURLs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $photoURLs
     * @param Category|CategoryShape|null $category
     * @param Status|value-of<Status>|null $status
     * @param list<Tag|TagShape>|null $tags
     */
    public static function with(
        string $name,
        array $photoURLs,
        ?int $id = null,
        Category|array|null $category = null,
        Status|string|null $status = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['photoURLs'] = $photoURLs;

        null !== $id && $self['id'] = $id;
        null !== $category && $self['category'] = $category;
        null !== $status && $self['status'] = $status;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<string> $photoURLs
     */
    public function withPhotoURLs(array $photoURLs): self
    {
        $self = clone $this;
        $self['photoURLs'] = $photoURLs;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Category|CategoryShape $category
     */
    public function withCategory(Category|array $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * pet status in the store.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<Tag|TagShape> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
