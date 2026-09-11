<?php

namespace Sequenzy\EmailBlocks\Types;

enum PreviewCartItemsResponseScenario: string
{
    case Real = "real";
    case One = "one";
    case Many = "many";
    case Empty = "empty";
    case MissingImages = "missing-images";
    case LongNames = "long-names";
}
