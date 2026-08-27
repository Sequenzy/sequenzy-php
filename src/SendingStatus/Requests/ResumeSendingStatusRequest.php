<?php

namespace Sequenzy\SendingStatus\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ResumeSendingStatusRequest extends JsonSerializableType
{
    /**
     * @var bool $listSanitizationConfirmed Must be true. Confirms the source of the invalid addresses is fixed and permanent bounces remain suppressed. Recorded on the account audit trail.
     */
    #[JsonProperty('listSanitizationConfirmed')]
    public bool $listSanitizationConfirmed;

    /**
     * @param array{
     *   listSanitizationConfirmed: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->listSanitizationConfirmed = $values['listSanitizationConfirmed'];
    }
}
