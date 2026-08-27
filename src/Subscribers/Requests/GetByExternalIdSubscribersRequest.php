<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class GetByExternalIdSubscribersRequest extends JsonSerializableType
{
    /**
     * @var string $externalId External ID. Query form supports IDs containing slashes.
     */
    public string $externalId;

    /**
     * @var ?bool $includeMachineEngagement Include detected scanner, preview, and tracked asset open/click events in subscriber email stats and recent activity.
     */
    public ?bool $includeMachineEngagement;

    /**
     * @param array{
     *   externalId: string,
     *   includeMachineEngagement?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->externalId = $values['externalId'];
        $this->includeMachineEngagement = $values['includeMachineEngagement'] ?? null;
    }
}
