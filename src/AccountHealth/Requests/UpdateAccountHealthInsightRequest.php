<?php

namespace Sequenzy\AccountHealth\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\AccountHealth\Types\UpdateAccountHealthInsightRequestAction;
use Sequenzy\Core\Json\JsonProperty;

class UpdateAccountHealthInsightRequest extends JsonSerializableType
{
    /**
     * @var value-of<UpdateAccountHealthInsightRequestAction> $action
     */
    #[JsonProperty('action')]
    public string $action;

    /**
     * @var ?int $snoozeDays Days to snooze, only with action snooze. Defaults to 7.
     */
    #[JsonProperty('snoozeDays')]
    public ?int $snoozeDays;

    /**
     * @param array{
     *   action: value-of<UpdateAccountHealthInsightRequestAction>,
     *   snoozeDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'];
        $this->snoozeDays = $values['snoozeDays'] ?? null;
    }
}
