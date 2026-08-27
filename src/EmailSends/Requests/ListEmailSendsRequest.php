<?php

namespace Sequenzy\EmailSends\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailSends\Types\ListEmailSendsRequestBounceType;
use Sequenzy\EmailSends\Types\ListEmailSendsRequestEmailType;
use Sequenzy\EmailSends\Types\ListEmailSendsRequestSortField;
use Sequenzy\EmailSends\Types\ListEmailSendsRequestSortOrder;
use Sequenzy\EmailSends\Types\ListEmailSendsRequestStatus;

class ListEmailSendsRequest extends JsonSerializableType
{
    /**
     * @var ?string $automationId
     */
    public ?string $automationId;

    /**
     * @var ?string $automationNodeId Filter to one email step of a sequence. Take the node ID from the `steps` array of the sequence metrics endpoint. Combined with `automationId` the two intersect.
     */
    public ?string $automationNodeId;

    /**
     * @var ?value-of<ListEmailSendsRequestBounceType> $bounceType
     */
    public ?string $bounceType;

    /**
     * @var ?string $campaignId
     */
    public ?string $campaignId;

    /**
     * @var ?int $days
     */
    public ?int $days;

    /**
     * @var ?value-of<ListEmailSendsRequestEmailType> $emailType
     */
    public ?string $emailType;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?string $q Compatibility alias for `search`.
     */
    public ?string $q;

    /**
     * @var ?string $recipient Case-insensitive recipient email filter.
     */
    public ?string $recipient;

    /**
     * @var ?string $search Case-insensitive subject/title or recipient search. `q` is accepted as an alias.
     */
    public ?string $search;

    /**
     * @var ?value-of<ListEmailSendsRequestSortField> $sortField
     */
    public ?string $sortField;

    /**
     * @var ?value-of<ListEmailSendsRequestSortOrder> $sortOrder
     */
    public ?string $sortOrder;

    /**
     * @var ?value-of<ListEmailSendsRequestStatus> $status Delivery status. Opened includes clicked deliveries.
     */
    public ?string $status;

    /**
     * @var ?string $subject Case-insensitive subject/title filter. `title` is accepted as an alias.
     */
    public ?string $subject;

    /**
     * @var ?string $title Compatibility alias for `subject`.
     */
    public ?string $title;

    /**
     * @var ?string $transactionalEmailId
     */
    public ?string $transactionalEmailId;

    /**
     * @param array{
     *   automationId?: ?string,
     *   automationNodeId?: ?string,
     *   bounceType?: ?value-of<ListEmailSendsRequestBounceType>,
     *   campaignId?: ?string,
     *   days?: ?int,
     *   emailType?: ?value-of<ListEmailSendsRequestEmailType>,
     *   limit?: ?int,
     *   page?: ?int,
     *   q?: ?string,
     *   recipient?: ?string,
     *   search?: ?string,
     *   sortField?: ?value-of<ListEmailSendsRequestSortField>,
     *   sortOrder?: ?value-of<ListEmailSendsRequestSortOrder>,
     *   status?: ?value-of<ListEmailSendsRequestStatus>,
     *   subject?: ?string,
     *   title?: ?string,
     *   transactionalEmailId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->automationId = $values['automationId'] ?? null;
        $this->automationNodeId = $values['automationNodeId'] ?? null;
        $this->bounceType = $values['bounceType'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->days = $values['days'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->q = $values['q'] ?? null;
        $this->recipient = $values['recipient'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->transactionalEmailId = $values['transactionalEmailId'] ?? null;
    }
}
