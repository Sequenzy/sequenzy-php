<?php

namespace Sequenzy\Types;

enum SubscriberImportListQualityIssuesItemKind: string
{
    case Undeliverable = "undeliverable";
    case Disposable = "disposable";
    case Role = "role";
}
