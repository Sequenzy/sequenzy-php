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
