<?php

namespace Lyramaker\Meucms\Latte\Extension;

use Latte\Extension;
use Lyramaker\Meucms\Latte\Node\NodeMethod;

class ExtensionMethod extends Extension{
    public function getTags():array{
        return [
            'csrf'=>NodeMethod::create(...)
        ];
    }
}