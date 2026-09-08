<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SavedFormSettings extends JsonSerializableType
{
    /**
     * @var value-of<SavedFormSettingsAfterSubmission> $afterSubmission
     */
    #[JsonProperty('afterSubmission')]
    public string $afterSubmission;

    /**
     * @var ?string $borderRadius
     */
    #[JsonProperty('borderRadius')]
    public ?string $borderRadius;

    /**
     * @var ?string $buttonColor
     */
    #[JsonProperty('buttonColor')]
    public ?string $buttonColor;

    /**
     * @var string $buttonText
     */
    #[JsonProperty('buttonText')]
    public string $buttonText;

    /**
     * @var array<SavedFormSettingsCustomFieldsItem> $customFields
     */
    #[JsonProperty('customFields'), ArrayType([SavedFormSettingsCustomFieldsItem::class])]
    public array $customFields;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var value-of<SavedFormSettingsDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public string $duplicateStrategy;

    /**
     * @var string $errorMessage
     */
    #[JsonProperty('errorMessage')]
    public string $errorMessage;

    /**
     * @var string $eyebrowText
     */
    #[JsonProperty('eyebrowText')]
    public string $eyebrowText;

    /**
     * @var array<string> $fieldOrder
     */
    #[JsonProperty('fieldOrder'), ArrayType(['string'])]
    public array $fieldOrder;

    /**
     * @var bool $firstNameRequired
     */
    #[JsonProperty('firstNameRequired')]
    public bool $firstNameRequired;

    /**
     * @var ?string $fontColor
     */
    #[JsonProperty('fontColor')]
    public ?string $fontColor;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $fontSize
     */
    #[JsonProperty('fontSize')]
    public ?string $fontSize;

    /**
     * @var value-of<SavedFormSettingsFormStyle> $formStyle
     */
    #[JsonProperty('formStyle')]
    public string $formStyle;

    /**
     * @var string $headline
     */
    #[JsonProperty('headline')]
    public string $headline;

    /**
     * @var string $imageAlt
     */
    #[JsonProperty('imageAlt')]
    public string $imageAlt;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var bool $lastNameRequired
     */
    #[JsonProperty('lastNameRequired')]
    public bool $lastNameRequired;

    /**
     * @var array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public array $listIds;

    /**
     * @var value-of<SavedFormSettingsListMode> $listMode
     */
    #[JsonProperty('listMode')]
    public string $listMode;

    /**
     * @var ?string $overlayColor
     */
    #[JsonProperty('overlayColor')]
    public ?string $overlayColor;

    /**
     * @var float $overlayOpacity
     */
    #[JsonProperty('overlayOpacity')]
    public float $overlayOpacity;

    /**
     * @var string $placeholderEmail
     */
    #[JsonProperty('placeholderEmail')]
    public string $placeholderEmail;

    /**
     * @var string $placeholderFirstName
     */
    #[JsonProperty('placeholderFirstName')]
    public string $placeholderFirstName;

    /**
     * @var string $placeholderLastName
     */
    #[JsonProperty('placeholderLastName')]
    public string $placeholderLastName;

    /**
     * @var string $redirectUrl
     */
    #[JsonProperty('redirectUrl')]
    public string $redirectUrl;

    /**
     * @var bool $showFirstName
     */
    #[JsonProperty('showFirstName')]
    public bool $showFirstName;

    /**
     * @var bool $showLastName
     */
    #[JsonProperty('showLastName')]
    public bool $showLastName;

    /**
     * @var ?string $successFontColor
     */
    #[JsonProperty('successFontColor')]
    public ?string $successFontColor;

    /**
     * @var string $successFontSize
     */
    #[JsonProperty('successFontSize')]
    public string $successFontSize;

    /**
     * @var string $successMessage
     */
    #[JsonProperty('successMessage')]
    public string $successMessage;

    /**
     * @var array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public array $tagIds;

    /**
     * @var value-of<SavedFormSettingsTemplateId> $templateId
     */
    #[JsonProperty('templateId')]
    public string $templateId;

    /**
     * @var value-of<SavedFormSettingsThemeMode> $themeMode
     */
    #[JsonProperty('themeMode')]
    public string $themeMode;

    /**
     * @var value-of<SavedFormSettingsVisualPlacement> $visualPlacement
     */
    #[JsonProperty('visualPlacement')]
    public string $visualPlacement;

    /**
     * @param array{
     *   afterSubmission: value-of<SavedFormSettingsAfterSubmission>,
     *   buttonText: string,
     *   customFields: array<SavedFormSettingsCustomFieldsItem>,
     *   description: string,
     *   duplicateStrategy: value-of<SavedFormSettingsDuplicateStrategy>,
     *   errorMessage: string,
     *   eyebrowText: string,
     *   fieldOrder: array<string>,
     *   firstNameRequired: bool,
     *   formStyle: value-of<SavedFormSettingsFormStyle>,
     *   headline: string,
     *   imageAlt: string,
     *   lastNameRequired: bool,
     *   listIds: array<string>,
     *   listMode: value-of<SavedFormSettingsListMode>,
     *   overlayOpacity: float,
     *   placeholderEmail: string,
     *   placeholderFirstName: string,
     *   placeholderLastName: string,
     *   redirectUrl: string,
     *   showFirstName: bool,
     *   showLastName: bool,
     *   successFontSize: string,
     *   successMessage: string,
     *   tagIds: array<string>,
     *   templateId: value-of<SavedFormSettingsTemplateId>,
     *   themeMode: value-of<SavedFormSettingsThemeMode>,
     *   visualPlacement: value-of<SavedFormSettingsVisualPlacement>,
     *   borderRadius?: ?string,
     *   buttonColor?: ?string,
     *   fontColor?: ?string,
     *   fontFamily?: ?string,
     *   fontSize?: ?string,
     *   imageUrl?: ?string,
     *   overlayColor?: ?string,
     *   successFontColor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->afterSubmission = $values['afterSubmission'];
        $this->borderRadius = $values['borderRadius'] ?? null;
        $this->buttonColor = $values['buttonColor'] ?? null;
        $this->buttonText = $values['buttonText'];
        $this->customFields = $values['customFields'];
        $this->description = $values['description'];
        $this->duplicateStrategy = $values['duplicateStrategy'];
        $this->errorMessage = $values['errorMessage'];
        $this->eyebrowText = $values['eyebrowText'];
        $this->fieldOrder = $values['fieldOrder'];
        $this->firstNameRequired = $values['firstNameRequired'];
        $this->fontColor = $values['fontColor'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->fontSize = $values['fontSize'] ?? null;
        $this->formStyle = $values['formStyle'];
        $this->headline = $values['headline'];
        $this->imageAlt = $values['imageAlt'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->lastNameRequired = $values['lastNameRequired'];
        $this->listIds = $values['listIds'];
        $this->listMode = $values['listMode'];
        $this->overlayColor = $values['overlayColor'] ?? null;
        $this->overlayOpacity = $values['overlayOpacity'];
        $this->placeholderEmail = $values['placeholderEmail'];
        $this->placeholderFirstName = $values['placeholderFirstName'];
        $this->placeholderLastName = $values['placeholderLastName'];
        $this->redirectUrl = $values['redirectUrl'];
        $this->showFirstName = $values['showFirstName'];
        $this->showLastName = $values['showLastName'];
        $this->successFontColor = $values['successFontColor'] ?? null;
        $this->successFontSize = $values['successFontSize'];
        $this->successMessage = $values['successMessage'];
        $this->tagIds = $values['tagIds'];
        $this->templateId = $values['templateId'];
        $this->themeMode = $values['themeMode'];
        $this->visualPlacement = $values['visualPlacement'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
