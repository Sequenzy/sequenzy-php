<?php

namespace Sequenzy\Websites\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Website;
use Sequenzy\Core\Types\ArrayType;

class ListWebsitesResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<Website> $websites
     */
    #[JsonProperty('websites'), ArrayType([Website::class])]
    public ?array $websites;

    /**
     * @param array{
     *   success?: ?bool,
     *   websites?: ?array<Website>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->websites = $values['websites'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
