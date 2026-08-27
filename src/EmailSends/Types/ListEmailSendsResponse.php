<?php

namespace Sequenzy\EmailSends\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\Pagination;

class ListEmailSendsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ListEmailSendsResponseEmailSendsItem> $emailSends
     */
    #[JsonProperty('emailSends'), ArrayType([ListEmailSendsResponseEmailSendsItem::class])]
    public ?array $emailSends;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?int $retentionDays
     */
    #[JsonProperty('retentionDays')]
    public ?int $retentionDays;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   emailSends?: ?array<ListEmailSendsResponseEmailSendsItem>,
     *   pagination?: ?Pagination,
     *   retentionDays?: ?int,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->emailSends = $values['emailSends'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->retentionDays = $values['retentionDays'] ?? null;
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
