<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputUntilDateSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
