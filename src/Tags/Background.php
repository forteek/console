<?php

namespace Fortek\Console\Tags;

use Fortek\Console\State;

class Background implements Tag
{
    public function apply(?State $currentState, string $text, string ...$args): State
    {
        if (count($args) !== 1) {
            throw new \InvalidArgumentException('Expected exactly 1 argument.');
        }

        return new State(
            $text,
            $currentState->foregroundColor,
            $args[0],
            $currentState->bold,
            $currentState->tagStack->push('background', $args[0])
        );
    }

    public function clear(State $currentState, string $text): State
    {
        return new State(
            $text,
            $currentState->foregroundColor,
            $currentState->tagStack->pop('background', 2),
            $currentState->bold,
            $currentState->tagStack
        );
    }
}
