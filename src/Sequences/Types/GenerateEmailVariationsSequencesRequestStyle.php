<?php

namespace Sequenzy\Sequences\Types;

enum GenerateEmailVariationsSequencesRequestStyle: string
{
    case Close = "close";
    case Fresh = "fresh";
    case Bold = "bold";
}
