<?php

namespace Fortek\Console\Encoders;

class BackgroundColorEncoder extends ColorEncoder implements Encoder
{
    public function encode(string $value): string
    {
        $code = $this->getEscapeCode($value);

        $codeParts = explode(';', $code);
        $codeParts[0] = (string) ((int) $codeParts[0] + 10);

        return "\x1b[" . implode(';', $codeParts) . "m";
    }
}
