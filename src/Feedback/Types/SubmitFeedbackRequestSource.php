<?php

namespace Sequenzy\Feedback\Types;

enum SubmitFeedbackRequestSource: string
{
    case Api = "api";
    case Cli = "cli";
    case Mcp = "mcp";
}
