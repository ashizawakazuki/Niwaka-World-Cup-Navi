<?php

// エスケープ処理（xss対策）
function escape (string $str): string {
    return htmlentities($str);
}