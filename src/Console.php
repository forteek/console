<?php

namespace Fortek\Console;

use Fortek\Console\Parsers\BbcodeParser;

class Console
{
    public function ask(string $prompt, string $default = ''): string
    {
        $parser = new BbcodeParser();

        if (!ctype_space($prompt[-1])) {
            if ($default) {
                $prompt .= ' [color=white](' . $default . ')[/color]';
            }

            $prompt .= ' ';
        } elseif ($default) {
            $whitespace = $prompt[-1];
            $prompt = substr($prompt, 0, -1) . ' [color=white](' . $default . ')[/color]' . $whitespace;
        }

        return readline($parser->parse($prompt)) ?: $default;
    }

    public function print(string $value = '', bool $newline = true): void
    {
        $parser = new BbcodeParser();

        echo $parser->parse($value);

        if ($newline) {
            echo PHP_EOL;
        }
    }
}
