<?php

namespace Sequenzy\Types;

enum SequenceDelayInputSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
