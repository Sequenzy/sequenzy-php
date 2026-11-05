<?php

namespace Sequenzy\Types;

enum SequenceTemplateSummaryChannelsItem: string
{
    case Push = "push";
    case InApp = "in_app";
    case Email = "email";
}
