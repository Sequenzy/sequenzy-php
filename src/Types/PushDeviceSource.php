<?php

namespace Sequenzy\Types;

enum PushDeviceSource: string
{
    case WebSdk = "web_sdk";
    case Api = "api";
}
