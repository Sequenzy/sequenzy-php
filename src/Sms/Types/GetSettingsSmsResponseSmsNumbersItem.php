<?php

namespace Sequenzy\Sms\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSettingsSmsResponseSmsNumbersItem extends JsonSerializableType
{
    /**
     * @var ?string $brandPrefix Per-number brand prefix override; null inherits the account-wide prefix.
     */
    #[JsonProperty('brandPrefix')]
    public ?string $brandPrefix;

    /**
     * @var ?string $e164
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $label User-set tag ("Marketing", "Support") shown in number pickers.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?bool $linkShorteningEnabled When true (the default), links in messages from this number are replaced with click-tracked short links. When false, they are sent exactly as written and SMS clicks from this number are not tracked.
     */
    #[JsonProperty('linkShorteningEnabled')]
    public ?bool $linkShorteningEnabled;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   brandPrefix?: ?string,
     *   e164?: ?string,
     *   id?: ?string,
     *   label?: ?string,
     *   linkShorteningEnabled?: ?bool,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->e164 = $values['e164'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->linkShorteningEnabled = $values['linkShorteningEnabled'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
