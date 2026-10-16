<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * One person's answer to "was this useful?" for one finding.
 */
class AccountHealthInsightFeedback extends JsonSerializableType
{
    /**
     * @var ?string $comment What made it useful or not, or null.
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @var ?value-of<AccountHealthInsightFeedbackRating> $rating
     */
    #[JsonProperty('rating')]
    public ?string $rating;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   comment?: ?string,
     *   rating?: ?value-of<AccountHealthInsightFeedbackRating>,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->comment = $values['comment'] ?? null;
        $this->rating = $values['rating'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
