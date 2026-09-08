<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailAiStyleState extends JsonSerializableType
{
    /**
     * @var bool $canManage Whether your key scopes and workspace role permit saving or clearing.
     */
    #[JsonProperty('canManage')]
    public bool $canManage;

    /**
     * @var ?string $revisionId Pass this as expectedStyleId on the next write. An unsupported style version still returns its revision for replacement or clearing.
     */
    #[JsonProperty('revisionId')]
    public ?string $revisionId;

    /**
     * @var ?EmailAiStyleStateStyle $style Independent version 1 appearance snapshot. No source copy, links or bindings are stored in block styles. Unsupported versions are returned as null.
     */
    #[JsonProperty('style')]
    public ?EmailAiStyleStateStyle $style;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   canManage: bool,
     *   success: bool,
     *   revisionId?: ?string,
     *   style?: ?EmailAiStyleStateStyle,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->canManage = $values['canManage'];
        $this->revisionId = $values['revisionId'] ?? null;
        $this->style = $values['style'] ?? null;
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
