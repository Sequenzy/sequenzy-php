<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class GetUsageSmsResponseUsageItem extends JsonSerializableType
{
    /**
     * @var float $creditsCharged
     */
    #[JsonProperty('creditsCharged')]
    public float $creditsCharged;

    /**
     * @var int $delivered
     */
    #[JsonProperty('delivered')]
    public int $delivered;

    /**
     * @var int $failed
     */
    #[JsonProperty('failed')]
    public int $failed;

    /**
     * @var string $fromNumber Sending phone number.
     */
    #[JsonProperty('fromNumber')]
    public string $fromNumber;

    /**
     * @var ?DateTime $lastSentAt
     */
    #[JsonProperty('lastSentAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSentAt;

    /**
     * @var int $testSends
     */
    #[JsonProperty('testSends')]
    public int $testSends;

    /**
     * @var int $totalSends
     */
    #[JsonProperty('totalSends')]
    public int $totalSends;

    /**
     * @param array{
     *   creditsCharged: float,
     *   delivered: int,
     *   failed: int,
     *   fromNumber: string,
     *   testSends: int,
     *   totalSends: int,
     *   lastSentAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->creditsCharged = $values['creditsCharged'];
        $this->delivered = $values['delivered'];
        $this->failed = $values['failed'];
        $this->fromNumber = $values['fromNumber'];
        $this->lastSentAt = $values['lastSentAt'] ?? null;
        $this->testSends = $values['testSends'];
        $this->totalSends = $values['totalSends'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
