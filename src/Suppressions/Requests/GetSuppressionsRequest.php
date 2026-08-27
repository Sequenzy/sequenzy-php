<?php

namespace Sequenzy\Suppressions\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetSuppressionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $region Optional AWS SES region. Omit to check the default region and regions used by the company's sending domains.
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
