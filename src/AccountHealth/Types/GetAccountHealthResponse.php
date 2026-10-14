<?php

namespace Sequenzy\AccountHealth\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountHealthOverview;
use Sequenzy\Core\Json\JsonProperty;

class GetAccountHealthResponse extends JsonSerializableType
{
    /**
     * @var ?AccountHealthOverview $accountHealth
     */
    #[JsonProperty('accountHealth')]
    public ?AccountHealthOverview $accountHealth;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   accountHealth?: ?AccountHealthOverview,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accountHealth = $values['accountHealth'] ?? null;
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
