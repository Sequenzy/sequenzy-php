<?php

namespace Sequenzy\Sequences\Types;

enum GetDefinitionSequencesResponseFormat: string
{
    case Readable = "readable";
    case Raw = "raw";
}
