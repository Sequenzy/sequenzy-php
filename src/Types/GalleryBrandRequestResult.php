<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GalleryBrandRequestResult extends JsonSerializableType
{
    /**
     * @var ?bool $created False when your company had already requested this domain.
     */
    #[JsonProperty('created')]
    public ?bool $created;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?GalleryBrandRequest $request
     */
    #[JsonProperty('request')]
    public ?GalleryBrandRequest $request;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   created?: ?bool,
     *   message?: ?string,
     *   request?: ?GalleryBrandRequest,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->created = $values['created'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->request = $values['request'] ?? null;
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
