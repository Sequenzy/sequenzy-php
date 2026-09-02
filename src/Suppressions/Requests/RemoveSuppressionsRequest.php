<?php

namespace Sequenzy\Suppressions\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class RemoveSuppressionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $region Deprecated: accepted and ignored. It previously limited a provider-side suppression lookup, which no longer happens.
     */
    public ?string $region;

    /**
     * @param array{
     *   region?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->region = $values['region'] ?? null;
    }
}
