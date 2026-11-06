<?php

namespace Sequenzy\Sequences\Types;

enum GetDefinitionByIdSequencesRequestFormat: string
{
    case Readable = "readable";
    case Raw = "raw";
}
