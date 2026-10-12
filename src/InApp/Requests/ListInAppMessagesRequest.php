<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\InApp\Types\ListInAppMessagesRequestKind;
use Sequenzy\InApp\Types\ListInAppMessagesRequestStatus;

class ListInAppMessagesRequest extends JsonSerializableType
{
    /**
     * @var ?string $email Contact email (case-insensitive).
     */
    public ?string $email;

    /**
     * @var ?string $externalId Contact external ID.
     */
    public ?string $externalId;

    /**
     * @var ?value-of<ListInAppMessagesRequestKind> $kind
     */
    public ?string $kind;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?value-of<ListInAppMessagesRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?string $subscriberId
     */
    public ?string $subscriberId;

    /**
     * @param array{
     *   email?: ?string,
     *   externalId?: ?string,
     *   kind?: ?value-of<ListInAppMessagesRequestKind>,
     *   limit?: ?int,
     *   status?: ?value-of<ListInAppMessagesRequestStatus>,
     *   subscriberId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
