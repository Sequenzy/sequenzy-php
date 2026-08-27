<?php

namespace Sequenzy\Types;

enum EmailBlockConditionFieldReferencePreviewSupport: string
{
    case AnyContact = "any_contact";
    case InlineTagsOrStoredSubscriber = "inline_tags_or_stored_subscriber";
    case StoredSubscriber = "stored_subscriber";
}
