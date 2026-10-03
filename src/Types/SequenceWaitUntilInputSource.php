<?php

namespace Sequenzy\Types;

enum SequenceWaitUntilInputSource: string
{
    case Event = "event";
    case Attribute = "attribute";
}
