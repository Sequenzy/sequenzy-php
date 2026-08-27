<?php

namespace Sequenzy\Sequences\Types;

enum SequenceUpdateRequestListScope: string
{
    case AnyContact = "any_contact";
    case AnyList = "any_list";
}
