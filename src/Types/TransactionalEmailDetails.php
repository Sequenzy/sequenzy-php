<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\TransactionalEmail;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;

class TransactionalEmailDetails extends JsonSerializableType
{
    use TransactionalEmail;

    /**
     * @var ?array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public ?array $blocks;

    /**
     * @var ?Email $email
     */
    #[JsonProperty('email')]
    public ?Email $email;

    /**
     * @var ?value-of<EmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?string $previewText
     */
    #[JsonProperty('previewText')]
    public ?string $previewText;

    /**
     * @var ?string $subject
     */
    #[JsonProperty('subject')]
    public ?string $subject;

    /**
     * @var ?array<string> $variables
     */
    #[JsonProperty('variables'), ArrayType(['string'])]
    public ?array $variables;

    /**
     * @param array{
     *   createdAt?: ?DateTime,
     *   emailId?: ?string,
     *   enabled?: ?bool,
     *   id?: ?string,
     *   name?: ?string,
     *   slug?: ?string,
     *   updatedAt?: ?DateTime,
     *   blocks?: ?array<EmailBlock>,
     *   email?: ?Email,
     *   emailPreset?: ?value-of<EmailPreset>,
     *   previewText?: ?string,
     *   subject?: ?string,
     *   variables?: ?array<string>,
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
        $this->blocks = $values['blocks'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->previewText = $values['previewText'] ?? null;
        $this->subject = $values['subject'] ?? null;
        $this->variables = $values['variables'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
