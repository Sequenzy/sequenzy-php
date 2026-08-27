<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SendingStatusRemediation extends JsonSerializableType
{
    /**
     * @var ?string $dashboardPath
     */
    #[JsonProperty('dashboardPath')]
    public ?string $dashboardPath;

    /**
     * @var ?string $dashboardUrl
     */
    #[JsonProperty('dashboardUrl')]
    public ?string $dashboardUrl;

    /**
     * @var ?string $docsUrl
     */
    #[JsonProperty('docsUrl')]
    public ?string $docsUrl;

    /**
     * @var ?array<string> $steps Ordered next steps for the current state.
     */
    #[JsonProperty('steps'), ArrayType(['string'])]
    public ?array $steps;

    /**
     * @var ?string $supportEmail
     */
    #[JsonProperty('supportEmail')]
    public ?string $supportEmail;

    /**
     * @param array{
     *   dashboardPath?: ?string,
     *   dashboardUrl?: ?string,
     *   docsUrl?: ?string,
     *   steps?: ?array<string>,
     *   supportEmail?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dashboardPath = $values['dashboardPath'] ?? null;
        $this->dashboardUrl = $values['dashboardUrl'] ?? null;
        $this->docsUrl = $values['docsUrl'] ?? null;
        $this->steps = $values['steps'] ?? null;
        $this->supportEmail = $values['supportEmail'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
