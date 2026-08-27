<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Subscribers\Types\ListSubscribersRequestAttributeOperator;
use Sequenzy\Subscribers\Types\ListSubscribersRequestIncludeTotal;
use Sequenzy\Subscribers\Types\ListSubscribersRequestStatus;

class ListSubscribersRequest extends JsonSerializableType
{
    /**
     * @var ?string $attribute Custom attribute filter using attributeName:value syntax, such as plan:pro or mrr:50.
     */
    public ?string $attribute;

    /**
     * @var ?value-of<ListSubscribersRequestAttributeOperator> $attributeOperator Attribute filter operator for direct cursor pagination. Use saved segments for exclusion operators such as is_not, not_contains, or is_empty.
     */
    public ?string $attributeOperator;

    /**
     * @var ?string $cursor Opaque cursor returned as pagination.nextCursor. Cannot be combined with `page`. Attribute-filtered requests return their own cursor, which is not interchangeable with the default-ordering cursor.
     */
    public ?string $cursor;

    /**
     * @var ?string $email Legacy alias for a partial email search
     */
    public ?string $email;

    /**
     * @var ?value-of<ListSubscribersRequestIncludeTotal> $includeTotal Pass `false` to skip the total-count query on page-numbered requests. Cursor requests always skip it.
     */
    public ?string $includeTotal;

    /**
     * @var ?int $limit Number of items per page (max 1000)
     */
    public ?int $limit;

    /**
     * @var ?string $list Subscriber list ID or exact list name. The API tries ID first, then exact name.
     */
    public ?string $list;

    /**
     * @var ?string $listId Filter by subscriber list ID.
     */
    public ?string $listId;

    /**
     * @var ?string $listName Filter by exact subscriber list name when the list ID is not known.
     */
    public ?string $listName;

    /**
     * @var ?int $page Page number. Cannot be combined with `cursor`.
     */
    public ?int $page;

    /**
     * @var ?string $query Free-text search across email, first name, last name, and tags
     */
    public ?string $query;

    /**
     * @var ?string $segmentId Filter by an existing segment ID
     */
    public ?string $segmentId;

    /**
     * @var ?value-of<ListSubscribersRequestStatus> $status Filter by subscriber status. Use all to disable status filtering.
     */
    public ?string $status;

    /**
     * @var ?string $tags Comma-separated tag names. Subscribers must have all provided tags.
     */
    public ?string $tags;

    /**
     * @var ?string $unsubscribedAfter Only return contacts whose `unsubscribedAt` is on or after this ISO 8601 date or datetime. Bare dates use UTC midnight; datetimes must include `Z` or an explicit offset. Contacts with no recorded opt-out date are excluded.
     */
    public ?string $unsubscribedAfter;

    /**
     * @var ?string $unsubscribedBefore Only return contacts whose `unsubscribedAt` is on or before this ISO 8601 date or datetime. Bare dates use UTC midnight; datetimes must include `Z` or an explicit offset. Combine with `unsubscribedAfter` to audit a window of opt-outs.
     */
    public ?string $unsubscribedBefore;

    /**
     * @param array{
     *   attribute?: ?string,
     *   attributeOperator?: ?value-of<ListSubscribersRequestAttributeOperator>,
     *   cursor?: ?string,
     *   email?: ?string,
     *   includeTotal?: ?value-of<ListSubscribersRequestIncludeTotal>,
     *   limit?: ?int,
     *   list?: ?string,
     *   listId?: ?string,
     *   listName?: ?string,
     *   page?: ?int,
     *   query?: ?string,
     *   segmentId?: ?string,
     *   status?: ?value-of<ListSubscribersRequestStatus>,
     *   tags?: ?string,
     *   unsubscribedAfter?: ?string,
     *   unsubscribedBefore?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->attribute = $values['attribute'] ?? null;
        $this->attributeOperator = $values['attributeOperator'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->includeTotal = $values['includeTotal'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->list = $values['list'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->listName = $values['listName'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->segmentId = $values['segmentId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->unsubscribedAfter = $values['unsubscribedAfter'] ?? null;
        $this->unsubscribedBefore = $values['unsubscribedBefore'] ?? null;
    }
}
