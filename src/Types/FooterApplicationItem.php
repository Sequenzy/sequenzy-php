<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class FooterApplicationItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<FooterApplicationItemKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<FooterApplicationItemReason> $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var value-of<FooterApplicationItemScope> $scope
     */
    #[JsonProperty('scope')]
    public string $scope;

    /**
     * @param array{
     *   id: string,
     *   kind: value-of<FooterApplicationItemKind>,
     *   name: string,
     *   scope: value-of<FooterApplicationItemScope>,
     *   reason?: ?value-of<FooterApplicationItemReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->kind = $values['kind'];
        $this->name = $values['name'];
        $this->reason = $values['reason'] ?? null;
        $this->scope = $values['scope'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
