<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class LandingPageSummary extends JsonSerializableType
{
    /**
     * @var ?string $appPublicUrl Sequenzy-hosted public URL when published.
     */
    #[JsonProperty('appPublicUrl')]
    public ?string $appPublicUrl;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?LandingPageContent $content
     */
    #[JsonProperty('content')]
    public ?LandingPageContent $content;

    /**
     * @var ?int $conversionCount
     */
    #[JsonProperty('conversionCount')]
    public ?int $conversionCount;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $customDomain Preferred verified custom hostname for this page.
     */
    #[JsonProperty('customDomain')]
    public ?string $customDomain;

    /**
     * @var ?value-of<LandingPageSummaryCustomDomainScope> $customDomainScope Whether the preferred hostname is dedicated to this page or inherited from the workspace.
     */
    #[JsonProperty('customDomainScope')]
    public ?string $customDomainScope;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewUrl Signed, unlisted visitor-facing preview of the current content. Works for drafts. Not indexed.
     */
    #[JsonProperty('previewUrl')]
    public ?string $previewUrl;

    /**
     * @var ?string $publicUrl Custom-domain public URL when a verified custom domain is connected, otherwise the Sequenzy-hosted public URL.
     */
    #[JsonProperty('publicUrl')]
    public ?string $publicUrl;

    /**
     * @var ?DateTime $publishedAt
     */
    #[JsonProperty('publishedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?value-of<LandingPageSummaryStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url Dashboard edit URL.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $viewCount
     */
    #[JsonProperty('viewCount')]
    public ?int $viewCount;

    /**
     * @param array{
     *   appPublicUrl?: ?string,
     *   companyId?: ?string,
     *   content?: ?LandingPageContent,
     *   conversionCount?: ?int,
     *   createdAt?: ?DateTime,
     *   customDomain?: ?string,
     *   customDomainScope?: ?value-of<LandingPageSummaryCustomDomainScope>,
     *   id?: ?string,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   publicUrl?: ?string,
     *   publishedAt?: ?DateTime,
     *   slug?: ?string,
     *   status?: ?value-of<LandingPageSummaryStatus>,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   viewCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->appPublicUrl = $values['appPublicUrl'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->conversionCount = $values['conversionCount'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->customDomain = $values['customDomain'] ?? null;
        $this->customDomainScope = $values['customDomainScope'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->publicUrl = $values['publicUrl'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->slug = $values['slug'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->viewCount = $values['viewCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
