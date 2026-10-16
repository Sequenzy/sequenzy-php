<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EditEmailsSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $dryRun Return the new content without saving it.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?array<string> $emailIds Only change these emails (emailId from Get Sequence). Omit to let the prompt decide.
     */
    #[JsonProperty('emailIds'), ArrayType(['string'])]
    public ?array $emailIds;

    /**
     * @var string $prompt What should change, in any language.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?array<string> $sectionIds Only change these top-level blocks. Needs exactly one emailIds entry.
     */
    #[JsonProperty('sectionIds'), ArrayType(['string'])]
    public ?array $sectionIds;

    /**
     * @param array{
     *   prompt: string,
     *   dryRun?: ?bool,
     *   emailIds?: ?array<string>,
     *   sectionIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dryRun = $values['dryRun'] ?? null;
        $this->emailIds = $values['emailIds'] ?? null;
        $this->prompt = $values['prompt'];
        $this->sectionIds = $values['sectionIds'] ?? null;
    }
}
