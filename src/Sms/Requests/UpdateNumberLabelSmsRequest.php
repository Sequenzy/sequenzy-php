<?php

namespace Sequenzy\Sms\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateNumberLabelSmsRequest extends JsonSerializableType
{
    /**
     * @var ?string $brandPrefix Per-number brand prefix override; messages send as "{prefix}: your message". Send null to clear it back to the account-wide prefix.
     */
    #[JsonProperty('brandPrefix')]
    public ?string $brandPrefix;

    /**
     * @var ?string $label Label such as Marketing or Support. Send null to clear it.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?bool $linkShorteningEnabled true replaces links in messages from this number with click-tracked short links; false sends them exactly as written, so SMS clicks from this number are not tracked.
     */
    #[JsonProperty('linkShorteningEnabled')]
    public ?bool $linkShorteningEnabled;

    /**
     * @param array{
     *   brandPrefix?: ?string,
     *   label?: ?string,
     *   linkShorteningEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->linkShorteningEnabled = $values['linkShorteningEnabled'] ?? null;
    }
}
