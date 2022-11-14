<?php

namespace Fortek\Console\Encoders;

interface Encoder
{
    public function encode(string $value): string;
}
