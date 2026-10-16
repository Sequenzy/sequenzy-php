<?php

namespace Sequenzy\AccountHealth\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\AccountHealthInsightFeedback;
use Sequenzy\Core\Json\JsonProperty;

class SubmitAccountHealthFeedbackResponse extends JsonSerializableType
{
    /**
     * @var ?AccountHealthInsightFeedback $feedback
     */
    #[JsonProperty('feedback')]
    public ?AccountHealthInsightFeedback $feedback;

    /**
     * @var ?string $insightId
     */
    #[JsonProperty('insightId')]
    public ?string $insightId;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   feedback?: ?AccountHealthInsightFeedback,
     *   insightId?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->feedback = $values['feedback'] ?? null;
        $this->insightId = $values['insightId'] ?? null;
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
