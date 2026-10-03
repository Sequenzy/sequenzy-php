<?php

namespace Sequenzy\Websites\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Website;

class ConfigureSendingDomainTrackingResponse extends JsonSerializableType
{
    /**
     * @var ?string $message Present when nothing changed because the company already uses another tracking domain.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?Website $website
     */
    #[JsonProperty('website')]
    public ?Website $website;

    /**
     * @param array{
     *   message?: ?string,
     *   success?: ?bool,
     *   website?: ?Website,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->website = $values['website'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
