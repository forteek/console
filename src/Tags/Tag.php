<?php

namespace Fortek\Console\Tags;

use Fortek\Console\State;

interface Tag
{
    public function apply(State $currentState, string $text, string ...$arg): State;
    public function clear(State $currentState, string $text): State;
}
