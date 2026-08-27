<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSettingsSmsResponseSms extends JsonSerializableType
{
    /**
     * @var ?string $brandPrefix
     */
    #[JsonProperty('brandPrefix')]
    public ?string $brandPrefix;

    /**
     * @var ?float $creditsBalance
     */
    #[JsonProperty('creditsBalance')]
    public ?float $creditsBalance;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?array<GetSettingsSmsResponseSmsNumbersItem> $numbers
     */
    #[JsonProperty('numbers'), ArrayType([GetSettingsSmsResponseSmsNumbersItem::class])]
    public ?array $numbers;

    /**
     * @var ?bool $planEligible
     */
    #[JsonProperty('planEligible')]
    public ?bool $planEligible;

    /**
     * @var ?bool $readyToSend
     */
    #[JsonProperty('readyToSend')]
    public ?bool $readyToSend;

    /**
     * @param array{
     *   brandPrefix?: ?string,
     *   creditsBalance?: ?float,
     *   enabled?: ?bool,
     *   numbers?: ?array<GetSettingsSmsResponseSmsNumbersItem>,
     *   planEligible?: ?bool,
     *   readyToSend?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->creditsBalance = $values['creditsBalance'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->numbers = $values['numbers'] ?? null;
        $this->planEligible = $values['planEligible'] ?? null;
        $this->readyToSend = $values['readyToSend'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
