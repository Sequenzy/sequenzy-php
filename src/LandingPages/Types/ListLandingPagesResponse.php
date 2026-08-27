<?php

namespace Sequenzy\LandingPages\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\LandingPageSummary;
use Sequenzy\Core\Types\ArrayType;

class ListLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?array<LandingPageSummary> $landingPages
     */
    #[JsonProperty('landingPages'), ArrayType([LandingPageSummary::class])]
    public ?array $landingPages;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   companyId?: ?string,
     *   landingPages?: ?array<LandingPageSummary>,
     *   success?: ?bool,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyId = $values['companyId'] ?? null;
        $this->landingPages = $values['landingPages'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
