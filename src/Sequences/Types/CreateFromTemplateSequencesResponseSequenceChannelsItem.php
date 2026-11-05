<?php

namespace Sequenzy\Sequences\Types;

enum CreateFromTemplateSequencesResponseSequenceChannelsItem: string
{
    case Push = "push";
    case InApp = "in_app";
    case Email = "email";
}
