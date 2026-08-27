<?php

namespace Sequenzy\Types;

enum SequenceGraphEditInputAction: string
{
    case MoveNode = "move_node";
    case DeleteNode = "delete_node";
    case DuplicateNode = "duplicate_node";
    case ReplaceEdges = "replace_edges";
}
