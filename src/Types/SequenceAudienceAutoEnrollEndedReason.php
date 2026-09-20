<?php

namespace Sequenzy\Types;

enum SequenceAudienceAutoEnrollEndedReason: string
{
    case CountdownEnded = "countdown_ended";
    case Disabled = "disabled";
}
