<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Push\Types\ListLiveActivitiesRequestKind;
use Sequenzy\Push\Types\ListLiveActivitiesRequestStatus;

class ListLiveActivitiesRequest extends JsonSerializableType
{
    /**
     * @var ?string $activityId
     */
    public ?string $activityId;

    /**
     * @var ?string $activityType
     */
    public ?string $activityType;

    /**
     * @var ?string $cursor nextCursor from the previous page.
     */
    public ?string $cursor;

    /**
     * @var ?string $email Only this contact's tokens.
     */
    public ?string $email;

    /**
     * @var ?value-of<ListLiveActivitiesRequestKind> $kind
     */
    public ?string $kind;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListLiveActivitiesRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?string $subscriberId
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   activityId?: ?string,
     *   activityType?: ?string,
     *   cursor?: ?string,
     *   email?: ?string,
     *   kind?: ?value-of<ListLiveActivitiesRequestKind>,
     *   limit?: ?int,
     *   status?: ?value-of<ListLiveActivitiesRequestStatus>,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activityId = $values['activityId'] ?? null;
        $this->activityType = $values['activityType'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
