<?php

namespace Sequenzy\EmailAiStyle\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailAiStyleCanvas;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SaveEmailAiStyleRequest extends JsonSerializableType
{
    /**
     * @var ?EmailAiStyleCanvas $canvas
     */
    #[JsonProperty('canvas')]
    public ?EmailAiStyleCanvas $canvas;

    /**
     * @var string $emailId Source email ID in this company, including campaign, sequence and transactional email rows. Use the underlying email ID, not a campaign ID or transactional slug.
     */
    #[JsonProperty('emailId')]
    public string $emailId;

    /**
     * @var ?string $expectedStyleId revisionId returned by GET. Use null only when no style is stored.
     */
    #[JsonProperty('expectedStyleId')]
    public ?string $expectedStyleId;

    /**
     * @var ?array<string> $layoutRuleIds IDs of detected layout habits to keep. Omit to keep every habit detected in the source; pass an empty array to keep none. Unknown IDs are ignored. Review style.layout.rules in the response.
     */
    #[JsonProperty('layoutRuleIds'), ArrayType(['string'])]
    public ?array $layoutRuleIds;

    /**
     * @var ?string $notes Optional design notes for future generations, for example "always open with a short video". Treated as design guidance, never as email content.
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @param array{
     *   emailId: string,
     *   canvas?: ?EmailAiStyleCanvas,
     *   expectedStyleId?: ?string,
     *   layoutRuleIds?: ?array<string>,
     *   notes?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canvas = $values['canvas'] ?? null;
        $this->emailId = $values['emailId'];
        $this->expectedStyleId = $values['expectedStyleId'] ?? null;
        $this->layoutRuleIds = $values['layoutRuleIds'] ?? null;
        $this->notes = $values['notes'] ?? null;
    }
}
