<?php

namespace Sequenzy\Types;

enum RenderEmailResponseEntityType: string
{
    case Campaign = "campaign";
    case SequenceStep = "sequence_step";
    case Template = "template";
}
