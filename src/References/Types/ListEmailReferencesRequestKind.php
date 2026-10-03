<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesRequestKind: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
    case Transactional = "transactional";
}
