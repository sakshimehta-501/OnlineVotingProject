<?php

//sanitizes user input 
function clean(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    
}
//Shortcut for safely print html
function e(?string $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

//redirect helpers
function redirect(string $path): void
{
    header("Location: " . $path);
    exit;
}


