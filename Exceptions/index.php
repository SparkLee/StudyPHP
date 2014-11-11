<?php
try {
    throw new Exception();
} catch (Exception $e) {
    var_dump($e);
}