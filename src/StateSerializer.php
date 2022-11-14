<?php

namespace Fortek\Console;

use Fortek\Console\Encoders\BackgroundColorEncoder;
use Fortek\Console\Encoders\Encoder;
use Fortek\Console\Encoders\ForegroundColorEncoder;

class StateSerializer
{
    protected Encoder $backgroundColorEncoder;
    protected Encoder $foregroundColorEncoder;

    public function __construct()
    {
        $this->backgroundColorEncoder = new BackgroundColorEncoder();
        $this->foregroundColorEncoder = new ForegroundColorEncoder();
    }

    public function serialize(State $state): string
    {
        $foreground = $state->foregroundColor ? $this->foregroundColorEncoder->encode($state->foregroundColor) : '';
        $background = $state->backgroundColor ? $this->backgroundColorEncoder->encode($state->backgroundColor) : '';
        $text = $state->text ?? '';

        return "\033[0m{$foreground}{$background}{$text}";
    }
}
