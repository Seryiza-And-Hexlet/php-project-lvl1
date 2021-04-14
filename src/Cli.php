<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const DEFAULT_NAME_DISABLED = null;
const MARKER_DISABLED = null;

function welcome()
{
    line('Welcome to the Brain Games!');
    $username = prompt('May I have your name? ', DEFAULT_NAME_DISABLED, MARKER_DISABLED);
    line("Hello, {$username}!");
}
