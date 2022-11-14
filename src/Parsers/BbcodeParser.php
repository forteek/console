<?php

namespace Fortek\Console\Parsers;

use Fortek\Console\State;
use Fortek\Console\StateSerializer;
use Fortek\Console\Tags\Background;
use Fortek\Console\Tags\Color;
use Fortek\Console\Tags\Tag;
use Fortek\Console\TagStack;

class BbcodeParser implements Parser
{
    protected array $tags;
    protected StateSerializer $stateSerializer;

    public function __construct()
    {
        $this->tags = [
            'color' => new Color(),
            'background' => new Background(),
        ];
        $this->stateSerializer = new StateSerializer();
    }

    public function parse(string $input): string
    {
        $match = preg_match('/\[(\/?\w+(?:=[\w\d]+(?:,[\w|\d]+)*)?)\]([^\[]*)/', $input, $tag);
        if (!$match) {
            return $input;
        }

        $inputBeginning = substr($input, 0, strpos($input, $tag[0]));

        $state = new State(
            $inputBeginning,
            null,
            null,
            null,
            new TagStack(),
        );

        $input = substr($input, strlen($inputBeginning));
        $serializationQueue = [$state];

        while ($match) {
            [$entireContent, $tagName, $text] = $tag;

            $isClosing = $tagName[0] === '/';
            if ($isClosing) {
                $tagName = substr($tagName, 1);
            }

            $tagNameParts = explode('=', $tagName);

            $tagName = $tagNameParts[0];
            $args = array_key_exists(1, $tagNameParts) ? explode(',', $tagNameParts[1]) : [];

            /** @var Tag $relevantTag */
            $relevantTag = $this->tags[$tagName];
            if ($isClosing) {
                $state = $relevantTag->clear($state, $text);
            } else {
                $state = $relevantTag->apply($state, $text, ...$args);
            }

            $serializationQueue[] = $state;
            $input = substr($input, strlen($entireContent));
            $match = preg_match('/\[(\/?\w+(?:=[\w\d]+(?:,[\w|\d]+)*)?)\]([^\[]*)/', $input, $tag);
        }

        $result = [];
        foreach ($serializationQueue as $state) {
            $result[] = $this->stateSerializer->serialize($state);
        }


        return implode('', $result);
    }
}
