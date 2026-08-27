<?php

namespace Sequenzy\Feedback\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Feedback\Types\SubmitFeedbackRequestCategory;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Feedback\Types\SubmitFeedbackRequestSource;
use Sequenzy\Feedback\Types\SubmitFeedbackRequestToolCallsItem;

class SubmitFeedbackRequest extends JsonSerializableType
{
    /**
     * @var ?string $actual What actually happened instead.
     */
    #[JsonProperty('actual')]
    public ?string $actual;

    /**
     * @var ?value-of<SubmitFeedbackRequestCategory> $category Feedback category. Use missing_capability when a needed workflow is not supported. Defaults to other.
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?string $context Optional description of what you were trying to accomplish when you hit the gap.
     */
    #[JsonProperty('context')]
    public ?string $context;

    /**
     * @var ?string $expected What you expected to happen.
     */
    #[JsonProperty('expected')]
    public ?string $expected;

    /**
     * @var string $message The feedback itself. Be specific about what was needed and what was missing or wrong.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?array<string> $resourceIds IDs of the affected resources so the team can correlate the report with server logs.
     */
    #[JsonProperty('resourceIds'), ArrayType(['string'])]
    public ?array $resourceIds;

    /**
     * @var ?value-of<SubmitFeedbackRequestSource> $source Where the feedback was submitted from. Defaults to api.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?array<SubmitFeedbackRequestToolCallsItem> $toolCalls For bug or wrong-outcome reports - the ordered API calls, CLI commands, or MCP tool calls that led to the problem. Summarize arguments; do not include raw subscriber data.
     */
    #[JsonProperty('toolCalls'), ArrayType([SubmitFeedbackRequestToolCallsItem::class])]
    public ?array $toolCalls;

    /**
     * @var ?string $userIntent For bug or wrong-outcome reports - the user's request, verbatim or closely paraphrased. Omit personal data not needed to reproduce the problem.
     */
    #[JsonProperty('userIntent')]
    public ?string $userIntent;

    /**
     * @param array{
     *   message: string,
     *   actual?: ?string,
     *   category?: ?value-of<SubmitFeedbackRequestCategory>,
     *   context?: ?string,
     *   expected?: ?string,
     *   resourceIds?: ?array<string>,
     *   source?: ?value-of<SubmitFeedbackRequestSource>,
     *   toolCalls?: ?array<SubmitFeedbackRequestToolCallsItem>,
     *   userIntent?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actual = $values['actual'] ?? null;
        $this->category = $values['category'] ?? null;
        $this->context = $values['context'] ?? null;
        $this->expected = $values['expected'] ?? null;
        $this->message = $values['message'];
        $this->resourceIds = $values['resourceIds'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->toolCalls = $values['toolCalls'] ?? null;
        $this->userIntent = $values['userIntent'] ?? null;
    }
}
