<?php

namespace Fortek\Console\Encoders;

class ForegroundColorEncoder extends ColorEncoder implements Encoder
{
    public function encode(string $value): string
    {
        return "\x1b[" . $this->getEscapeCode($value) . "m";
    }
}
