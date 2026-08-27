<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class IntegrationDetailRecommendationsItem extends JsonSerializableType
{
    /**
     * @var ?string $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?string $code
     */
    #[JsonProperty('code')]
    public ?string $code;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<IntegrationDetailRecommendationsItemSeverity> $severity
     */
    #[JsonProperty('severity')]
    public ?string $severity;

    /**
     * @param array{
     *   action?: ?string,
     *   code?: ?string,
     *   message?: ?string,
     *   severity?: ?value-of<IntegrationDetailRecommendationsItemSeverity>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->code = $values['code'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->severity = $values['severity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
