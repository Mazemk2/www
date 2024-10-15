<?php

class Template
{
    private $path;
    private $parameters = [];

    public function __construct(string $path, array $parameters = [])
    {
        $this->path = rtrim($path, '/') . '/';
        $this->parameters = $parameters;
    }

    public function render(string $view, array $context = []): string
    {
        return $this->load($view, array_merge($context, ['template' => $this]));
    }

    private function load(string $view, array $context): string
    {
        if (!file_exists($file = $this->path . $view)) {
            throw new \Exception(sprintf('The file %s could not be found.', $file));
        }

        extract($context);
        ob_start();
        include($file);
        return ob_get_clean();
    }

    public function get(string $key)
    {
        return $this->parameters[$key] ?? null;
    }
}
