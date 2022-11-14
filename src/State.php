<?php

namespace Fortek\Console;

class State
{
    public function __construct(
        public readonly ?string $text,
        public readonly ?string $foregroundColor,
        public readonly ?string $backgroundColor,
        public readonly ?bool $bold,
        public readonly TagStack $tagStack,
    ) {}
}
