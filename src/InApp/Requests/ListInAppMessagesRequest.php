<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\InApp\Types\ListInAppMessagesRequestDeliver;
use Sequenzy\InApp\Types\ListInAppMessagesRequestKind;
use Sequenzy\InApp\Types\ListInAppMessagesRequestStatus;

class ListInAppMessagesRequest extends JsonSerializableType
{
    /**
     * @var ?string $actions Open items only: comma-separated button actions your app handles beyond open_url and dismiss, such as request_push_permission. Items with an action you don't list stay in the inbox but are left out, so an app that can't handle them never shows them. The mobile SDKs send this themselves.
     */
    public ?string $actions;

    /**
     * @var ?value-of<ListInAppMessagesRequestDeliver> $deliver Open feeds only. true (default) first delivers live in-app campaigns the contact qualifies for, as the app's own feed does; false lists without delivering, for looking at a contact's feed (support, agents) without counting a delivery.
     */
    public ?string $deliver;

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
     * @var ?value-of<ListInAppMessagesRequestKind> $kind Only one kind. Open feeds never list placement items (kind=placement with status open returns 400); use Get Placement Content for what each placement shows, or status=all for history.
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
     *   actions?: ?string,
     *   deliver?: ?value-of<ListInAppMessagesRequestDeliver>,
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
        $this->actions = $values['actions'] ?? null;
        $this->deliver = $values['deliver'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->formats = $values['formats'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
    }
}
