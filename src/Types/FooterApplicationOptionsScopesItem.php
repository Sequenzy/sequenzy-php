<?php

namespace Sequenzy\Types;

enum FooterApplicationOptionsScopesItem: string
{
    case Sequences = "sequences";
    case Campaigns = "campaigns";
    case Transactional = "transactional";
    case Templates = "templates";
}
