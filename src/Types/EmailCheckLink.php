<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class EmailCheckLink extends JsonSerializableType
{
    /**
     * @var ?string $blockId Block that contains the URL.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $blockType
     */
    #[JsonProperty('blockType')]
    public ?string $blockType;

    /**
     * @var ?string $finalUrl Where the URL ended up after redirects, when it redirected.
     */
    #[JsonProperty('finalUrl')]
    public ?string $finalUrl;

    /**
     * @var ?array<EmailCheckLinkFindingsItem> $findings No-network rule results for this URL.
     */
    #[JsonProperty('findings'), ArrayType([EmailCheckLinkFindingsItem::class])]
    public ?array $findings;

    /**
     * @var ?int $httpStatus Final HTTP status code, when a response was received.
     */
    #[JsonProperty('httpStatus')]
    public ?int $httpStatus;

    /**
     * @var ?value-of<EmailCheckLinkKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?string $label Button text, link text, or image alt text.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @var ?string $message Plain-language result, such as "Page not found (404)".
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?value-of<EmailCheckLinkStatus> $status ok - answered with a success status (after redirects). broken - page or domain not found, certificate problem, redirect loop, or rejected request. invalid - can never work for recipients: a rule already found it unusable (localhost, a private address, a mistyped or missing https://), or the domain points to a private address. server_error - 5xx answer. unreachable - timed out or refused. restricted - the site refused an automated check (for example 401, 403 or 429); it may work in a browser and is not counted as broken. personalized - built from merge tags filled per recipient, so only its syntax is checked. not_checked - mailto and tel links, links not reached before the 25-second limit, or live checks turned off.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $url The URL as it will be sent. {{company.url}} is replaced with the company website; other merge tags are left as authored.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   blockId?: ?string,
     *   blockType?: ?string,
     *   finalUrl?: ?string,
     *   findings?: ?array<EmailCheckLinkFindingsItem>,
     *   httpStatus?: ?int,
     *   kind?: ?value-of<EmailCheckLinkKind>,
     *   label?: ?string,
     *   message?: ?string,
     *   status?: ?value-of<EmailCheckLinkStatus>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->blockType = $values['blockType'] ?? null;
        $this->finalUrl = $values['finalUrl'] ?? null;
        $this->findings = $values['findings'] ?? null;
        $this->httpStatus = $values['httpStatus'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->label = $values['label'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->status = $values['status'] ?? null;
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
