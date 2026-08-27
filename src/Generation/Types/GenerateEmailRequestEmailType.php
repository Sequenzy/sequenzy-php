<?php

namespace Sequenzy\Generation\Types;

enum GenerateEmailRequestEmailType: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
