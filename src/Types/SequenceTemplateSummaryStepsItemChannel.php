<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryStepsItemChannel: string
{
    case Push = "push";
    case InApp = "in_app";
    case Email = "email";
}
