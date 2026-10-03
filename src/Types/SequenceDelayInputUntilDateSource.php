<?php

namespace Sequenzy\Types;

enum SequenceDelayInputUntilDateSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
