<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class EmailCheckIssue extends JsonSerializableType
{
    /**
     * @var ?string $blockId Block to edit, when the finding has one location.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var value-of<EmailCheckIssueCategory> $category Score category the finding counts against.
     */
    #[JsonProperty('category')]
    public string $category;

    /**
     * @var string $message Plain-language description of the finding.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $rule Stable rule ID. The prefix groups it: links, images, content, subject, preview, accessibility, or compatibility. Examples: links.broken, links.unreachable, links.missing-scheme, links.local, links.staging, links.example-domain, links.insecure, links.shortener, links.text-mismatch, links.missing-website, images.broken, images.large, images.missing-alt, content.placeholder-text, content.merge-tag-fallback, subject.fake-reply, compatibility.gmail-clip.
     */
    #[JsonProperty('rule')]
    public ?string $rule;

    /**
     * @var value-of<EmailCheckIssueSeverity> $severity error - fix before sending. warning - worth reviewing. info - a tip that does not need action.
     */
    #[JsonProperty('severity')]
    public string $severity;

    /**
     * @var ?string $url The URL concerned, for link and image findings.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   category: value-of<EmailCheckIssueCategory>,
     *   message: string,
     *   severity: value-of<EmailCheckIssueSeverity>,
     *   blockId?: ?string,
     *   rule?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->category = $values['category'];
        $this->message = $values['message'];
        $this->rule = $values['rule'] ?? null;
        $this->severity = $values['severity'];
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
