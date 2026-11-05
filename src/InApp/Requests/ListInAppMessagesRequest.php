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
     * @var ?string $formats Comma-separated message formats your app renders: modal, banner, fullscreen, html. With status open, messages in other formats are left out (cards are unaffected), so custom HTML messages appear only when html is listed. With status all, every format is listed and html adds the documents of the first 3 custom HTML messages. Unknown names return 400.
     */
    public ?string $formats;

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
     *   formats?: ?string,
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
        $this->formats = $values['formats'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
