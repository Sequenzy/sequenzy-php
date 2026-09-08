<?php

namespace Sequenzy\Traits;

use Sequenzy\Types\FooterApplicationItemKind;
use Sequenzy\Types\FooterApplicationItemReason;
use Sequenzy\Types\FooterApplicationItemScope;
use Sequenzy\Core\Json\JsonProperty;

/**
 * @property string $id
 * @property value-of<FooterApplicationItemKind> $kind
 * @property string $name
 * @property ?value-of<FooterApplicationItemReason> $reason
 * @property value-of<FooterApplicationItemScope> $scope
 */
trait FooterApplicationItem
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
}
