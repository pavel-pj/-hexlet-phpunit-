<?php

namespace Hexlet\Phpunit\Stack;

function make()
{
    return [];
}

function isEmpty($stack)
{
    return count($stack) === 0;
}

function push(&$stack, $element)
{
    array_push($stack, $element);
}

function pop(&$stack)
{
    if (isEmpty($stack)) {
        throw new \Exception("Stack is empty!");
    }
    return array_pop($stack);
}
