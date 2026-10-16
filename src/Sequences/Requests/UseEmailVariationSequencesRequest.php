<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Sequences\Types\UseEmailVariationSequencesRequestScope;

class UseEmailVariationSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?bool $dryRun Return what would change without saving.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?value-of<UseEmailVariationSequencesRequestScope> $scope email changes only this email; all also gives every other email of the sequence its style.
     */
    #[JsonProperty('scope')]
    public ?string $scope;

    /**
     * @param array{
     *   dryRun?: ?bool,
     *   scope?: ?value-of<UseEmailVariationSequencesRequestScope>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dryRun = $values['dryRun'] ?? null;
        $this->scope = $values['scope'] ?? null;
    }
}
