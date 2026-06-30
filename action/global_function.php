<?php

/**
 * エスケープ処理のための関数
 * @param string $str 文字列を受け取る
 * @return string エスケープ処理をして返す
 */
function escape (string $str): string {
    return htmlentities($str);
}