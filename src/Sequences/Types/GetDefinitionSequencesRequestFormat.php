<?php

namespace Sequenzy\Sequences\Types;

enum GetDefinitionSequencesRequestFormat: string
{
    case Readable = "readable";
    case Raw = "raw";
}
