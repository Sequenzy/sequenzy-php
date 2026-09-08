<?php

namespace Sequenzy\Types;

enum FooterApplicationItemScope: string
{
    case Sequences = "sequences";
    case Campaigns = "campaigns";
    case Transactional = "transactional";
    case Templates = "templates";
}
