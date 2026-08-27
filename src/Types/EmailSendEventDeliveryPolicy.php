<?php

namespace Sequenzy\Types;

enum EmailSendEventDeliveryPolicy: string
{
    case Marketing = "marketing";
    case Transactional = "transactional";
}
