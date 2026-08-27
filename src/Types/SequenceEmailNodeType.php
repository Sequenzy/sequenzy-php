<?php

namespace Sequenzy\Types;

enum SequenceEmailNodeType: string
{
    case ActionEmail = "action_email";
    case ActionAbTest = "action_ab_test";
}
