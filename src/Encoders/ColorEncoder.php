<?php

namespace Fortek\Console\Encoders;

use Fortek\Console\Enums\FourBitColors;

abstract class ColorEncoder
{
    protected function getEscapeCode(string $color): string
    {
        if (str_starts_with($color, '#')) {
            return $this->resolveTruecolorCode($color);
        }

        $encodedColor = FourBitColors::tryFrom($color);
        if (!$encodedColor) {
            throw new \InvalidArgumentException('Invalid color \'' . $color . '\'.');
        }

        return (string) $encodedColor->code();
    }

    protected function resolveTruecolorCode(string $color): string
    {
        return '31';
    }
}
