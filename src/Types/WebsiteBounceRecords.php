<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * How the bounce subdomain is published. With style cname (domains added since the single CNAME shipped), publish cnameRecord instead of the spf.record and mailFrom.mxRecord records, which verification keeps checking through the CNAME. With style mx_txt (domains added earlier), publish those two records. The style is set when the domain is added.
 */
class WebsiteBounceRecords extends JsonSerializableType
{
    /**
     * @var ?WebsiteBounceRecordsCnameRecord $cnameRecord The CNAME to publish when style is cname, otherwise null.
     */
    #[JsonProperty('cnameRecord')]
    public ?WebsiteBounceRecordsCnameRecord $cnameRecord;

    /**
     * @var ?array<string, mixed> $diagnostic For style cname, why the CNAME is not verified yet (missing, pointing elsewhere, other records on the name, or a proxied record). Null for style mx_txt; read spf.diagnostic and mailFrom.diagnostic instead.
     */
    #[JsonProperty('diagnostic'), ArrayType(['string' => 'mixed'])]
    public ?array $diagnostic;

    /**
     * @var value-of<WebsiteBounceRecordsStatus> $status verified once SPF and MX both resolve correctly at the bounce subdomain, whichever records produce them.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<WebsiteBounceRecordsStyle> $style
     */
    #[JsonProperty('style')]
    public string $style;

    /**
     * @param array{
     *   status: value-of<WebsiteBounceRecordsStatus>,
     *   style: value-of<WebsiteBounceRecordsStyle>,
     *   cnameRecord?: ?WebsiteBounceRecordsCnameRecord,
     *   diagnostic?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cnameRecord = $values['cnameRecord'] ?? null;
        $this->diagnostic = $values['diagnostic'] ?? null;
        $this->status = $values['status'];
        $this->style = $values['style'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
