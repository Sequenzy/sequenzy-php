<?php

namespace Sequenzy\Conversations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Conversations\Types\UpdateStatusConversationsRequestStatus;
use Sequenzy\Core\Json\JsonProperty;

class UpdateStatusConversationsRequest extends JsonSerializableType
{
    /**
     * @var value-of<UpdateStatusConversationsRequestStatus> $status New conversation status.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   status: value-of<UpdateStatusConversationsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
