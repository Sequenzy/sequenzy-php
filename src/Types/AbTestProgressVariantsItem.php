<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class AbTestProgressVariantsItem extends JsonSerializableType
{
    /**
     * @var ?int $committed
     */
    #[JsonProperty('committed')]
    public ?int $committed;

    /**
     * @var ?int $failed Recipients with failed attempts and no successful or pending attempt.
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?int $pending
     */
    #[JsonProperty('pending')]
    public ?int $pending;

    /**
     * @var ?int $sent
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?string $variantId
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   committed?: ?int,
     *   failed?: ?int,
     *   pending?: ?int,
     *   sent?: ?int,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->committed = $values['committed'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->pending = $values['pending'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
