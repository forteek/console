<?php

namespace Fortek\Console\Enums;

enum FourBitColors: string
{
    case BLACK = 'black';
    case RED = 'red';
    case GREEN = 'green';
    case YELLOW = 'yellow';
    case BLUE = 'blue';
    case MAGENTA = 'magenta';
    case CYAN = 'cyan';
    case WHITE = 'white';

    case BRIGHT_BLACK = 'brightblack';
    case BRIGHT_RED = 'brightred';
    case BRIGHT_GREEN = 'brightgreen';
    case BRIGHT_YELLOW = 'brightyellow';
    case BRIGHT_BLUE = 'brightblue';
    case BRIGHT_MAGENTA = 'brightmagenta';
    case BRIGHT_CYAN = 'brightcyan';
    case BRIGHT_WHITE = 'brightwhite';

    public function code(): int
    {
        return match ($this) {
            self::BLACK => 30,
            self::RED => 31,
            self::GREEN => 32,
            self::YELLOW => 33,
            self::BLUE => 34,
            self::MAGENTA => 35,
            self::CYAN => 36,
            self::WHITE => 37,

            self::BRIGHT_BLACK => 90,
            self::BRIGHT_RED => 91,
            self::BRIGHT_GREEN => 92,
            self::BRIGHT_YELLOW => 93,
            self::BRIGHT_BLUE => 94,
            self::BRIGHT_MAGENTA => 95,
            self::BRIGHT_CYAN => 96,
            self::BRIGHT_WHITE => 97,
        };
    }
}
