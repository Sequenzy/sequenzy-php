<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SubscriberEmailStats extends JsonSerializableType
{
    /**
     * @var ?int $bounced
     */
    #[JsonProperty('bounced')]
    public ?int $bounced;

    /**
     * @var ?int $clicked
     */
    #[JsonProperty('clicked')]
    public ?int $clicked;

    /**
     * @var ?int $complained
     */
    #[JsonProperty('complained')]
    public ?int $complained;

    /**
     * @var ?int $delivered
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?int $opened
     */
    #[JsonProperty('opened')]
    public ?int $opened;

    /**
     * @var ?int $sent
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?int $unsubscribed
     */
    #[JsonProperty('unsubscribed')]
    public ?int $unsubscribed;

    /**
     * @param array{
     *   bounced?: ?int,
     *   clicked?: ?int,
     *   complained?: ?int,
     *   delivered?: ?int,
     *   opened?: ?int,
     *   sent?: ?int,
     *   unsubscribed?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bounced = $values['bounced'] ?? null;
        $this->clicked = $values['clicked'] ?? null;
        $this->complained = $values['complained'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->opened = $values['opened'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->unsubscribed = $values['unsubscribed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
