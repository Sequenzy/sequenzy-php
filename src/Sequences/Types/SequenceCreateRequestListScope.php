<?php

namespace Sequenzy\Sequences\Types;

enum SequenceCreateRequestListScope: string
{
    case AnyContact = "any_contact";
    case AnyList = "any_list";
}
