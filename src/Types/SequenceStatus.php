<?php

namespace Sequenzy\Types;

enum SequenceStatus: string
{
    case Draft = "draft";
    case Active = "active";
    case Paused = "paused";
    case Archived = "archived";
}
