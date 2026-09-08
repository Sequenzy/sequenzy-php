<?php

namespace Sequenzy\Types;

enum SavedFormStatus: string
{
    case Draft = "draft";
    case Published = "published";
}
