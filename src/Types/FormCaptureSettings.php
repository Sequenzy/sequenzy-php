<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class FormCaptureSettings extends JsonSerializableType
{
    /**
     * @var value-of<FormCaptureSettingsAfterSubmission> $afterSubmission
     */
    #[JsonProperty('afterSubmission')]
    public string $afterSubmission;

    /**
     * @var value-of<FormCaptureSettingsDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public string $duplicateStrategy;

    /**
     * @var array<string> $listIds
     */
    #[JsonProperty('listIds'), ArrayType(['string'])]
    public array $listIds;

    /**
     * @var value-of<FormCaptureSettingsListMode> $listMode
     */
    #[JsonProperty('listMode')]
    public string $listMode;

    /**
     * @var string $redirectUrl
     */
    #[JsonProperty('redirectUrl')]
    public string $redirectUrl;

    /**
     * @var array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public array $tagIds;

    /**
     * @param array{
     *   afterSubmission: value-of<FormCaptureSettingsAfterSubmission>,
     *   duplicateStrategy: value-of<FormCaptureSettingsDuplicateStrategy>,
     *   listIds: array<string>,
     *   listMode: value-of<FormCaptureSettingsListMode>,
     *   redirectUrl: string,
     *   tagIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->afterSubmission = $values['afterSubmission'];
        $this->duplicateStrategy = $values['duplicateStrategy'];
        $this->listIds = $values['listIds'];
        $this->listMode = $values['listMode'];
        $this->redirectUrl = $values['redirectUrl'];
        $this->tagIds = $values['tagIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
