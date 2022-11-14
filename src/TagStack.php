<?php

namespace Fortek\Console;

class TagStack
{
    protected array $items = [];

    public function push(string $tag, string $value): self
    {
        $this->items[$tag][] = $value;

        return $this;
    }

    public function pop(string $tag, int $depth = 1): ?string
    {
        for ($i = 0; $i < $depth; $i++) {
            array_pop($this->items[$tag]);
        }

        return array_pop($this->items[$tag]);
    }
}
