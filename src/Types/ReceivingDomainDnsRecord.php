<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class ReceivingDomainDnsRecord extends JsonSerializableType
{
    /**
     * @var string $name Fully qualified record name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?int $priority MX records only.
     */
    #[JsonProperty('priority')]
    public ?int $priority;

    /**
     * @var value-of<ReceivingDomainDnsRecordStatus> $status misconfigured (MX only) means the name also has MX records for another mail service, which would split its mail.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<ReceivingDomainDnsRecordType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $value
     */
    #[JsonProperty('value')]
    public string $value;

    /**
     * @param array{
     *   name: string,
     *   status: value-of<ReceivingDomainDnsRecordStatus>,
     *   type: value-of<ReceivingDomainDnsRecordType>,
     *   value: string,
     *   priority?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->priority = $values['priority'] ?? null;
        $this->status = $values['status'];
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
