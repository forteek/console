<?php

namespace Fortek\Console\Tags;

use Fortek\Console\State;

class Color implements Tag
{
    public function apply(?State $currentState, string $text, string ...$args): State
    {
        if (count($args) !== 1) {
            throw new \InvalidArgumentException('Expected exactly 1 argument.');
        }

        return new State(
            $text,
            $args[0],
            $currentState->backgroundColor,
            $currentState->bold,
            $currentState->tagStack->push('color', $args[0])
        );
    }

    public function clear(State $currentState, string $text): State
    {
        return new State(
            $text,
            $currentState->tagStack->pop('color', 2),
            $currentState->backgroundColor,
            $currentState->bold,
            $currentState->tagStack
        );
    }
}
