<?php

namespace Sequenzy\AccountHealth\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\AccountHealth\Types\SubmitAccountHealthFeedbackRequestRating;

class SubmitAccountHealthFeedbackRequest extends JsonSerializableType
{
    /**
     * @var ?string $comment What made it useful or not. Leading and trailing spaces are trimmed. Omit to keep an earlier comment; null or an empty string clears it.
     */
    #[JsonProperty('comment')]
    public ?string $comment;

    /**
     * @var value-of<SubmitAccountHealthFeedbackRequestRating> $rating
     */
    #[JsonProperty('rating')]
    public string $rating;

    /**
     * @param array{
     *   rating: value-of<SubmitAccountHealthFeedbackRequestRating>,
     *   comment?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->comment = $values['comment'] ?? null;
        $this->rating = $values['rating'];
    }
}
