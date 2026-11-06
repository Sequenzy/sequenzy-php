<?php

namespace Sequenzy\Sequences\Types;

enum GetDefinitionByIdSequencesResponseFormat: string
{
    case Readable = "readable";
    case Raw = "raw";
}
