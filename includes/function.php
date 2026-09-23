<?php

//sanitizes user input 
function clean(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    
}
//Sshortcut for safely print html
function e(?sting $value): string
{
    return htmlspecialchars ((sting)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

//redirect helpers
function redirect(string $path): void
{
    header('Location: $path');
    exit;
}


