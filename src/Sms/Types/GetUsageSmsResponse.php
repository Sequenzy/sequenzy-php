<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetUsageSmsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<GetUsageSmsResponseUsageItem> $usage
     */
    #[JsonProperty('usage'), ArrayType([GetUsageSmsResponseUsageItem::class])]
    public array $usage;

    /**
     * @param array{
     *   success: bool,
     *   usage: array<GetUsageSmsResponseUsageItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->usage = $values['usage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
