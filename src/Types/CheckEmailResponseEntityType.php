<?php

namespace Sequenzy\Types;

enum CheckEmailResponseEntityType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Template = "template";
}
