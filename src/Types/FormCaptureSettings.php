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
     * @var value-of<FormCaptureSettingsResubscribeBehavior> $resubscribeBehavior What happens when a contact who unsubscribed from all email submits the form or popup again. `reactivate` resubscribes them and restores the target lists. `double_opt_in` sends the workspace confirmation email first. Workspace double opt-in always requires confirmation.
     */
    #[JsonProperty('resubscribeBehavior')]
    public string $resubscribeBehavior;

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
     *   resubscribeBehavior: value-of<FormCaptureSettingsResubscribeBehavior>,
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
        $this->resubscribeBehavior = $values['resubscribeBehavior'];
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
