<?php

namespace Sequenzy\Types;

enum SequenceEmailUpdateInputEmailPreset: string
{
    case Branded = "branded";
    case Minimal = "minimal";
}
