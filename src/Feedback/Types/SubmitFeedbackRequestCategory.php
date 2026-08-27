<?php

namespace Sequenzy\Feedback\Types;

enum SubmitFeedbackRequestCategory: string
{
    case MissingCapability = "missing_capability";
    case Bug = "bug";
    case Docs = "docs";
    case Ux = "ux";
    case Praise = "praise";
    case Other = "other";
}
