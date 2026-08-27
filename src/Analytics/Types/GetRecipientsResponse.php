<?php

namespace Sequenzy\Analytics\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\Pagination;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetRecipientsResponse extends JsonSerializableType
{
    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?array<GetRecipientsResponseRecipientsItem> $recipients
     */
    #[JsonProperty('recipients'), ArrayType([GetRecipientsResponseRecipientsItem::class])]
    public ?array $recipients;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   pagination?: ?Pagination,
     *   recipients?: ?array<GetRecipientsResponseRecipientsItem>,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pagination = $values['pagination'] ?? null;
        $this->recipients = $values['recipients'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
