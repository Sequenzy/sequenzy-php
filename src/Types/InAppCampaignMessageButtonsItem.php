<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class InAppCampaignMessageButtonsItem extends JsonSerializableType
{
    /**
     * @var ?value-of<InAppCampaignMessageButtonsItemAction> $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var string $label
     */
    #[JsonProperty('label')]
    public string $label;

    /**
     * @var ?string $url https URL, app deep link or merge tag; required for open_url.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   label: string,
     *   action?: ?value-of<InAppCampaignMessageButtonsItemAction>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->action = $values['action'] ?? null;
        $this->label = $values['label'];
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
