<?php

namespace Sequenzy\LandingPages\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RenderLandingPagesResponse extends JsonSerializableType
{
    /**
     * @var ?string $landingPageId
     */
    #[JsonProperty('landingPageId')]
    public ?string $landingPageId;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewUrl
     */
    #[JsonProperty('previewUrl')]
    public ?string $previewUrl;

    /**
     * @var ?string $publicUrl
     */
    #[JsonProperty('publicUrl')]
    public ?string $publicUrl;

    /**
     * @var ?bool $published
     */
    #[JsonProperty('published')]
    public ?bool $published;

    /**
     * @var ?value-of<RenderLandingPagesResponseStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   landingPageId?: ?string,
     *   message?: ?string,
     *   name?: ?string,
     *   previewUrl?: ?string,
     *   publicUrl?: ?string,
     *   published?: ?bool,
     *   status?: ?value-of<RenderLandingPagesResponseStatus>,
     *   success?: ?bool,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->landingPageId = $values['landingPageId'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewUrl = $values['previewUrl'] ?? null;
        $this->publicUrl = $values['publicUrl'] ?? null;
        $this->published = $values['published'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
