<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CheckEmailResponseLinkSummary extends JsonSerializableType
{
    /**
     * @var ?int $broken Links with status broken or invalid.
     */
    #[JsonProperty('broken')]
    public ?int $broken;

    /**
     * @var ?int $checked
     */
    #[JsonProperty('checked')]
    public ?int $checked;

    /**
     * @var ?int $notChecked Links with status personalized or not_checked.
     */
    #[JsonProperty('notChecked')]
    public ?int $notChecked;

    /**
     * @var ?int $ok
     */
    #[JsonProperty('ok')]
    public ?int $ok;

    /**
     * @var ?int $restricted
     */
    #[JsonProperty('restricted')]
    public ?int $restricted;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $warnings Links with status server_error or unreachable.
     */
    #[JsonProperty('warnings')]
    public ?int $warnings;

    /**
     * @param array{
     *   broken?: ?int,
     *   checked?: ?int,
     *   notChecked?: ?int,
     *   ok?: ?int,
     *   restricted?: ?int,
     *   total?: ?int,
     *   warnings?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->broken = $values['broken'] ?? null;
        $this->checked = $values['checked'] ?? null;
        $this->notChecked = $values['notChecked'] ?? null;
        $this->ok = $values['ok'] ?? null;
        $this->restricted = $values['restricted'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
