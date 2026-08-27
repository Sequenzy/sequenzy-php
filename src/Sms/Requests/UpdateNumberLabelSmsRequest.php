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
     * @param array{
     *   brandPrefix?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brandPrefix = $values['brandPrefix'] ?? null;
        $this->label = $values['label'] ?? null;
    }
}
