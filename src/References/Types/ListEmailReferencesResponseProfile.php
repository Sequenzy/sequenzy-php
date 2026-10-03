<?php

namespace Sequenzy\References\Types;

enum ListEmailReferencesResponseProfile: string
{
    case Ready = "ready";
    case Missing = "missing";
}
