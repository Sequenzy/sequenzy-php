<?php

namespace Sequenzy\Suppressions\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class RemoveSuppressionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $region Optional AWS SES region used to limit the remaining-suppression inspection. It never authorizes removal of an SES account-level entry.
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
