<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\TransactionalEmail;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;

class TransactionalEmailListItem extends JsonSerializableType
{
    use TransactionalEmail;

    /**
     * @var ?value-of<EmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?TransactionalEmailListItemStats $stats
     */
    #[JsonProperty('stats')]
    public ?TransactionalEmailListItemStats $stats;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   slug?: ?string,
     *   updatedAt?: ?DateTime,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   stats?: ?TransactionalEmailListItemStats,
     *   subject?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->emailId = $values['emailId'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->subject = $values['subject'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
