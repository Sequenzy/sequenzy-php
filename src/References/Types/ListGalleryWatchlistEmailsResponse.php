<?php

namespace Sequenzy\References\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\GalleryWatchedBrandEmail;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListGalleryWatchlistEmailsResponse extends JsonSerializableType
{
    /**
     * @var ?array<GalleryWatchedBrandEmail> $emails
     */
    #[JsonProperty('emails'), ArrayType([GalleryWatchedBrandEmail::class])]
    public ?array $emails;

    /**
     * @var ?string $nextCursor Pass as `cursor` for the next page. `null` on the last page.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   emails?: ?array<GalleryWatchedBrandEmail>,
     *   nextCursor?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emails = $values['emails'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
