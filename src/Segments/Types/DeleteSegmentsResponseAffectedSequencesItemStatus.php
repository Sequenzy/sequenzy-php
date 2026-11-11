<?php

namespace Sequenzy\Segments\Types;

enum DeleteSegmentsResponseAffectedSequencesItemStatus: string
{
    case Draft = "draft";
    case Active = "active";
    case Paused = "paused";
}
