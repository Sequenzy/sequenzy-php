<?php

namespace Sequenzy\Types;

enum TransactionalSendDiagnosticsMissingRequiredVariablesItemUsedInItemSurface: string
{
    case Subject = "subject";
    case PreviewText = "previewText";
    case Body = "body";
    case Block = "block";
}
