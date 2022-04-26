<?php

namespace View;

class View {

    static function render(string $view, array $params): void {

        // Extract controller variables
        extract($params, EXTR_SKIP);
        // Page template path.
        
        $content = __DIR__ . "/html/$view.php";
        if (is_readable($content)) {
            // Include global template
            require_once __DIR__ . "/html/$view.php";;
            
        } else {
            
            throw new \Exception("View $view not found");
        }
    }
}
