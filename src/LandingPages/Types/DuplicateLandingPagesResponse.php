<?php

namespace Sequenzy\LandingPages\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\LandingPageSummary;
use Sequenzy\Core\Json\JsonProperty;

class DuplicateLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?LandingPageSummary $landingPage
     */
    #[JsonProperty('landingPage')]
    public ?LandingPageSummary $landingPage;

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
     * @param array{
     *   landingPage?: ?LandingPageSummary,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->landingPage = $values['landingPage'] ?? null;
        $this->message = $values['message'] ?? null;
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
