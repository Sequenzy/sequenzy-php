<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Form audience and submission settings. listMode default uses the workspace default lists; none joins no lists; specific uses listIds. All listIds and tagIds must belong to your company. Custom field names must be unique and cannot be email, firstName, lastName or website. Redirect URLs must pass HTTP/HTTPS validation.
 */
class LandingPageFormConfig extends JsonSerializableType
{
    /**
     * @var ?string $buttonText
     */
    #[JsonProperty('buttonText')]
    public ?string $buttonText;

    /**
     * @var ?array<LandingPageFormCustomField> $customFields Up to eight custom subscriber attributes. Names use letters, numbers, underscores, dots or dashes and must start with a letter. Use unique names; email, firstName, lastName and website are reserved.
     */
    #[JsonProperty('customFields'), ArrayType([LandingPageFormCustomField::class])]
    public ?array $customFields;

    /**
     * @var ?value-of<LandingPageFormConfigDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var ?string $emailPlaceholder
     */
    #[JsonProperty('emailPlaceholder')]
    public ?string $emailPlaceholder;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?string $firstNamePlaceholder
     */
    #[JsonProperty('firstNamePlaceholder')]
    public ?string $firstNamePlaceholder;

    /**
     * @var ?bool $firstNameRequired
     */
    #[JsonProperty('firstNameRequired')]
    public ?bool $firstNameRequired;

    /**
     * @var ?string $lastNamePlaceholder
     */
    #[JsonProperty('lastNamePlaceholder')]
    public ?string $lastNamePlaceholder;

    /**
     * @var ?bool $lastNameRequired
     */
    #[JsonProperty('lastNameRequired')]
    public ?bool $lastNameRequired;

    /**
     * @var ?array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public ?array $listIds;

    /**
     * @var ?value-of<LandingPageFormConfigListMode> $listMode
     */
    #[JsonProperty('listMode')]
    public ?string $listMode;

    /**
     * @var ?string $phonePlaceholder
     */
    #[JsonProperty('phonePlaceholder')]
    public ?string $phonePlaceholder;

    /**
     * @var ?bool $phoneRequired
     */
    #[JsonProperty('phoneRequired')]
    public ?bool $phoneRequired;

    /**
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @var ?bool $showFirstName
     */
    #[JsonProperty('showFirstName')]
    public ?bool $showFirstName;

    /**
     * @var ?bool $showLastName
     */
    #[JsonProperty('showLastName')]
    public ?bool $showLastName;

    /**
     * @var ?bool $showPhone
     */
    #[JsonProperty('showPhone')]
    public ?bool $showPhone;

    /**
     * @var ?string $successMessage
     */
    #[JsonProperty('successMessage')]
    public ?string $successMessage;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @param array{
     *   buttonText?: ?string,
     *   customFields?: ?array<LandingPageFormCustomField>,
     *   duplicateStrategy?: ?value-of<LandingPageFormConfigDuplicateStrategy>,
     *   emailPlaceholder?: ?string,
     *   enabled?: ?bool,
     *   firstNamePlaceholder?: ?string,
     *   firstNameRequired?: ?bool,
     *   lastNamePlaceholder?: ?string,
     *   lastNameRequired?: ?bool,
     *   listIds?: ?array<string>,
     *   listMode?: ?value-of<LandingPageFormConfigListMode>,
     *   phonePlaceholder?: ?string,
     *   phoneRequired?: ?bool,
     *   redirectUrl?: ?string,
     *   showFirstName?: ?bool,
     *   showLastName?: ?bool,
     *   showPhone?: ?bool,
     *   successMessage?: ?string,
     *   tagIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonText = $values['buttonText'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->emailPlaceholder = $values['emailPlaceholder'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->firstNamePlaceholder = $values['firstNamePlaceholder'] ?? null;
        $this->firstNameRequired = $values['firstNameRequired'] ?? null;
        $this->lastNamePlaceholder = $values['lastNamePlaceholder'] ?? null;
        $this->lastNameRequired = $values['lastNameRequired'] ?? null;
        $this->listIds = $values['listIds'] ?? null;
        $this->listMode = $values['listMode'] ?? null;
        $this->phonePlaceholder = $values['phonePlaceholder'] ?? null;
        $this->phoneRequired = $values['phoneRequired'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->showFirstName = $values['showFirstName'] ?? null;
        $this->showLastName = $values['showLastName'] ?? null;
        $this->showPhone = $values['showPhone'] ?? null;
        $this->successMessage = $values['successMessage'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
