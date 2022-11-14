<?php

namespace Fortek\Console\Parsers;

interface Parser
{
    public function parse(string $text): string;
}
