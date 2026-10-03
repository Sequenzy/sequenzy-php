<?php

namespace Sequenzy\Push\Types;

enum SetApnsCredentialsRequestEnvironment: string
{
    case Production = "production";
    case Sandbox = "sandbox";
}
