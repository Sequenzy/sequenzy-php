<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetByExternalIdPathSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events in subscriber email stats and recent activity.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @param array{
     *   includeMachineEngagement?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
    }
}
