<?php

namespace Sequenzy\Campaigns\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Campaigns\Types\ScheduleCampaignsRequestRecurringInterval;
use DateTime;
use Sequenzy\Core\Types\Date;

class ScheduleCampaignsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $listIds Shorthand for sending to one or more lists. Equivalent to `targetLists` `{"type":"lists","listIds":["list_123"]}`. Mutually exclusive with targetLists.
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<ScheduleCampaignsRequestRecurringInterval> $recurringInterval Repeat the campaign on a cadence starting at scheduledAt. The campaign becomes a recurring template - each run is duplicated and sent automatically, re-evaluating audience membership every time. Omit or send null for a one-shot send; scheduling again without it stops the recurrence.
     */
    #[JsonProperty('recurringInterval')]
    public ?string $recurringInterval;

    /**
     * @var DateTime $scheduledAt Future send time.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $scheduledAt;

    /**
     * @var ?string $scheduledTimezone IANA timezone the scheduledAt wall-clock time refers to, for example America/New_York. Required with sendInRecipientTimezone.
     */
    #[JsonProperty('scheduledTimezone')]
    public ?string $scheduledTimezone;

    /**
     * @var ?bool $sendInRecipientTimezone Deliver at scheduledAt's wall-clock time in each recipient's own timezone. Requires scheduledTimezone. Contacts without a stored timezone receive the campaign at scheduledAt itself. Not combinable with recurringInterval or spreadOverHours. Omitting it on a reschedule preserves the campaign's existing setting; send false to turn it off.
     */
    #[JsonProperty('sendInRecipientTimezone')]
    public ?bool $sendInRecipientTimezone;

    /**
     * @var ?bool $sendTimeOptimization Deliver each recipient at their predicted best open hour within sendTimeWindowHours of scheduledAt (default 12h, max 24). Campaign-only: there is no company or sequence STO toggle. Sequences use sendingWindow instead. spreadOverHours takes precedence and turns STO off; sendInRecipientTimezone also turns it off.
     */
    #[JsonProperty('sendTimeOptimization')]
    public ?bool $sendTimeOptimization;

    /**
     * @var ?int $sendTimeWindowHours STO delivery window in hours from scheduledAt. Defaults to 12. Only used when sendTimeOptimization is true. Recipients whose predicted hour falls outside the window are snapped to the nearest edge.
     */
    #[JsonProperty('sendTimeWindowHours')]
    public ?int $sendTimeWindowHours;

    /**
     * @var ?float $spreadOverHours Spread delivery over this many hours. When set, spread delivery takes precedence over send-time optimization.
     */
    #[JsonProperty('spreadOverHours')]
    public ?float $spreadOverHours;

    /**
     * @var ?array<string, mixed> $targetLists Optional targeting object. Omit to reuse saved targeting - or, when none is saved, ALL active subscribers. The object is a union discriminated on type: {"type":"all"}, {"type":"lists","listIds":["list_123"]}, {"type":"segment","segmentId":"seg_123"}, {"type":"filtered","filters":[],"filterJoinOperator":"and"}, {"type":"rules","include":[],"exclude":[]}. Mutually exclusive with listIds.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @param array{
     *   scheduledAt: DateTime,
     *   listIds?: ?array<string>,
     *   recurringInterval?: ?value-of<ScheduleCampaignsRequestRecurringInterval>,
     *   scheduledTimezone?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
     *   spreadOverHours?: ?float,
     *   targetLists?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->listIds = $values['listIds'] ?? null;
        $this->recurringInterval = $values['recurringInterval'] ?? null;
        $this->scheduledAt = $values['scheduledAt'];
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
        $this->spreadOverHours = $values['spreadOverHours'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
    }
}
