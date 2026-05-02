<?php

namespace Lyramaker\Meucms\Latte\Node;

use Generator;
use Latte\Compiler\Nodes\StatementNode;
use Latte\Compiler\PrintContext;
use Latte\Compiler\Tag;
use Override;

class NodeMethod extends StatementNode
{

    public static function create(Tag $tag): self
    {
        $node = $tag->node = new self;
        return $node;
    }

    #[Override]
    public function print(PrintContext $context): string
    {
        return $context->format(
            'echo "<input type=\'hidden\' name=\'_csrf\' value=\'" . Lyrathor\Router\csrf() . "\'> \n"; %line;',
            $this->position,
        );
    }

    #[Override]
    public function &getIterator(): Generator
    {
        false && yield;
    }
}
