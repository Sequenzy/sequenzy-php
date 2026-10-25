<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetMetricsBreakdownResponseRowsItem extends JsonSerializableType
{
    /**
     * @var int $bounced
     */
    #[JsonProperty('bounced')]
    public int $bounced;

    /**
     * @var float $bounceRate Percentage of sent.
     */
    #[JsonProperty('bounceRate')]
    public float $bounceRate;

    /**
     * @var int $clicked
     */
    #[JsonProperty('clicked')]
    public int $clicked;

    /**
     * @var float $clickRate Percentage of delivered.
     */
    #[JsonProperty('clickRate')]
    public float $clickRate;

    /**
     * @var int $complained
     */
    #[JsonProperty('complained')]
    public int $complained;

    /**
     * @var ?int $conversions Attributed goal conversions. Provider and domain come from the send each conversion is attributed to.
     */
    #[JsonProperty('conversions')]
    public ?int $conversions;

    /**
     * @var int $delivered
     */
    #[JsonProperty('delivered')]
    public int $delivered;

    /**
     * @var float $deliveryRate Percentage of sent.
     */
    #[JsonProperty('deliveryRate')]
    public float $deliveryRate;

    /**
     * @var ?string $detail Secondary label, such as the sequence an email step belongs to.
     */
    #[JsonProperty('detail')]
    public ?string $detail;

    /**
     * @var ?array<string, mixed> $filter The filter that narrows a later request to this row: `{kind: "source", source: {type, id}}` (pass as `source=<type>:<id>`), `{kind: "email_type", emailType}`, `{kind: "mailbox_provider", mailboxProvider}` or `{kind: "recipient_domain", recipientDomain}`. Null when the row cannot be drilled into.
     */
    #[JsonProperty('filter'), ArrayType(['string' => 'mixed'])]
    public ?array $filter;

    /**
     * @var string $key Dimension value (an id, email type, provider or domain). Empty when the events predate the column.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var int $opened
     */
    #[JsonProperty('opened')]
    public int $opened;

    /**
     * @var float $openRate Percentage of delivered.
     */
    #[JsonProperty('openRate')]
    public float $openRate;

    /**
     * @var ?float $revenue Attributed revenue in currency units.
     */
    #[JsonProperty('revenue')]
    public ?float $revenue;

    /**
     * @var int $sent
     */
    #[JsonProperty('sent')]
    public int $sent;

    /**
     * @var int $unsubscribed
     */
    #[JsonProperty('unsubscribed')]
    public int $unsubscribed;

    /**
     * @var float $unsubscribeRate Percentage of delivered.
     */
    #[JsonProperty('unsubscribeRate')]
    public float $unsubscribeRate;

    /**
     * @param array{
     *   bounced: int,
     *   bounceRate: float,
     *   clicked: int,
     *   clickRate: float,
     *   complained: int,
     *   delivered: int,
     *   deliveryRate: float,
     *   key: string,
     *   label: string,
     *   opened: int,
     *   openRate: float,
     *   sent: int,
     *   unsubscribed: int,
     *   unsubscribeRate: float,
     *   conversions?: ?int,
     *   detail?: ?string,
     *   filter?: ?array<string, mixed>,
     *   revenue?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bounced = $values['bounced'];
        $this->bounceRate = $values['bounceRate'];
        $this->clicked = $values['clicked'];
        $this->clickRate = $values['clickRate'];
        $this->complained = $values['complained'];
        $this->conversions = $values['conversions'] ?? null;
        $this->delivered = $values['delivered'];
        $this->deliveryRate = $values['deliveryRate'];
        $this->detail = $values['detail'] ?? null;
        $this->filter = $values['filter'] ?? null;
        $this->key = $values['key'];
        $this->label = $values['label'];
        $this->opened = $values['opened'];
        $this->openRate = $values['openRate'];
        $this->revenue = $values['revenue'] ?? null;
        $this->sent = $values['sent'];
        $this->unsubscribed = $values['unsubscribed'];
        $this->unsubscribeRate = $values['unsubscribeRate'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
