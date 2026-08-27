<?php

namespace Sequenzy\Types;

enum SequenceStepInputDuration: string
{
    case Once = "once";
    case Forever = "forever";
    case Repeating = "repeating";
}
