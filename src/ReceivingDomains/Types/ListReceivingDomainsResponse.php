<?php

namespace Sequenzy\ReceivingDomains\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\ReceivingDomain;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListReceivingDomainsResponse extends JsonSerializableType
{
    /**
     * @var array<ReceivingDomain> $receivingDomains
     */
    #[JsonProperty('receivingDomains'), ArrayType([ReceivingDomain::class])]
    public array $receivingDomains;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   receivingDomains: array<ReceivingDomain>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->receivingDomains = $values['receivingDomains'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
