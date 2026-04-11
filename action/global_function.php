<?php

function escape (string $str): string {
    return htmlentities($str);
}