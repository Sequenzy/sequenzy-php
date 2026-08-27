<?php

namespace Sequenzy\Types;

enum SequenceNodeUpdateInputChangesEmailPreset: string
{
    case Branded = "branded";
    case Minimal = "minimal";
}
