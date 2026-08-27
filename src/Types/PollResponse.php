<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * One respondent's latest answer to one Poll or NPS block.
 */
class PollResponse extends JsonSerializableType
{
    /**
     * @var ?bool $allowMultiple Whether the poll accepted several selections.
     */
    #[JsonProperty('allowMultiple')]
    public ?bool $allowMultiple;

    /**
     * @var ?array<string> $answers Selected option labels. One entry, or several for a multi-select poll.
     */
    #[JsonProperty('answers'), ArrayType(['string'])]
    public ?array $answers;

    /**
     * @var ?string $attributeKey Subscriber attribute the answer was stored under.
     */
    #[JsonProperty('attributeKey')]
    public ?string $attributeKey;

    /**
     * @var ?string $blockId Poll block ID inside the email content.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $email Null when the subscriber has since been deleted.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?string $firstName
     */
    #[JsonProperty('firstName')]
    public ?string $firstName;

    /**
     * @var ?string $lastName
     */
    #[JsonProperty('lastName')]
    public ?string $lastName;

    /**
     * @var ?string $question
     */
    #[JsonProperty('question')]
    public ?string $question;

    /**
     * @var ?DateTime $respondedAt
     */
    #[JsonProperty('respondedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $respondedAt;

    /**
     * @var ?string $subscriberId
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?array<string> $values Stored values parallel to `answers`.
     */
    #[JsonProperty('values'), ArrayType(['string'])]
    public ?array $values;

    /**
     * @var ?value-of<PollResponseVariant> $variant
     */
    #[JsonProperty('variant')]
    public ?string $variant;

    /**
     * @param array{
     *   allowMultiple?: ?bool,
     *   answers?: ?array<string>,
     *   attributeKey?: ?string,
     *   blockId?: ?string,
     *   email?: ?string,
     *   externalId?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   question?: ?string,
     *   respondedAt?: ?DateTime,
     *   subscriberId?: ?string,
     *   values?: ?array<string>,
     *   variant?: ?value-of<PollResponseVariant>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowMultiple = $values['allowMultiple'] ?? null;
        $this->answers = $values['answers'] ?? null;
        $this->attributeKey = $values['attributeKey'] ?? null;
        $this->blockId = $values['blockId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->question = $values['question'] ?? null;
        $this->respondedAt = $values['respondedAt'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->values = $values['values'] ?? null;
        $this->variant = $values['variant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
