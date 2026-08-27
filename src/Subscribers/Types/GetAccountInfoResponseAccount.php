<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetAccountInfoResponseAccount extends JsonSerializableType
{
    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?string $companyName
     */
    #[JsonProperty('companyName')]
    public ?string $companyName;

    /**
     * @param array{
     *   companyId?: ?string,
     *   companyName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->companyId = $values['companyId'] ?? null;
        $this->companyName = $values['companyName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
