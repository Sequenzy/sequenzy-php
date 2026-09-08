<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailAiStyleLayoutRule extends JsonSerializableType
{
    /**
     * @var string $block Target block type, for example button or video.
     */
    #[JsonProperty('block')]
    public string $block;

    /**
     * @var ?string $companion Content-free companion descriptor for around/before/after rules, for example divider:dots.
     */
    #[JsonProperty('companion')]
    public ?string $companion;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $id Stable rule identifier, for example around|button|divider:dots. Pass it in layoutRuleIds to keep the habit.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<EmailAiStyleLayoutRuleKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @param array{
     *   block: string,
     *   description: string,
     *   id: string,
     *   kind: value-of<EmailAiStyleLayoutRuleKind>,
     *   companion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->block = $values['block'];
        $this->companion = $values['companion'] ?? null;
        $this->description = $values['description'];
        $this->id = $values['id'];
        $this->kind = $values['kind'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
