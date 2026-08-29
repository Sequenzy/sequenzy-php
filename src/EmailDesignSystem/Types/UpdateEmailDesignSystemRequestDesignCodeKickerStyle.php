<?php

namespace Sequenzy\EmailDesignSystem\Types;

enum UpdateEmailDesignSystemRequestDesignCodeKickerStyle: string
{
    case Chip = "chip";
    case Letterspaced = "letterspaced";
    case None = "none";
}
