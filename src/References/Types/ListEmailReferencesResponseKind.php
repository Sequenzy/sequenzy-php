<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesResponseKind: string
{
    case Campaign = "campaign";
    case Sequence = "sequence";
    case Transactional = "transactional";
}
