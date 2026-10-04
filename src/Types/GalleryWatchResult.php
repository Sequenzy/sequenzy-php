<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GalleryWatchResult extends JsonSerializableType
{
    /**
     * @var ?bool $created False when your company already watched this domain.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?GalleryWatchedBrand $watch
     */
    #[JsonProperty('watch')]
    public ?GalleryWatchedBrand $watch;

    /**
     * @param array{
     *   created?: ?bool,
     *   message?: ?string,
     *   success?: ?bool,
     *   watch?: ?GalleryWatchedBrand,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->watch = $values['watch'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
