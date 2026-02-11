<?php
// app/View.php
namespace App;

class View
{
    private string $viewPath;
    private string $layoutPath = '';
    private array $data = [];

    /**
     * Constructor
     * @param string $view Path ke file view (contoh: 'home/index')
     */
    public function __construct(string $view)
    {
        // Konversi path view seperti 'home/index' ke full file path
        $this->viewPath = __DIR__ . '/../views/' . $view . '.php';

        // Cek apakah file view ada
        if (!file_exists($this->viewPath)) {
            throw new \Exception("View not found: {$this->viewPath}");
        }
    }

    /**
     * Kirim data ke view
     * @param array $data Array asosiatif dari data
     * @return self
     */
    public function with(array $data): self
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * Set layout untuk view ini
     * @param string $layout Path ke file layout (contoh: 'layouts/main')
     * @return self
     */
    public function layout(string $layout): self
    {
        $this->layoutPath = __DIR__ . '/../views/' . $layout . '.php';

        if (!file_exists($this->layoutPath)) {
            throw new \Exception("Layout not found: {$this->layoutPath}");
        }

        return $this;
    }

    /**
     * Render view
     * @return string HTML yang di-render
     */
    public function render(): string
    {
        // Extract array data ke variabel
        extract($this->data);

        // Mulai output buffering
        ob_start();

        // Include file view
        include $this->viewPath;

        // Ambil konten view
        $content = ob_get_clean();

        // Jika layout di-set, bungkus content dalam layout
        if ($this->layoutPath) {
            ob_start();
            include $this->layoutPath;
            $content = ob_get_clean();
        }

        return $content;
    }

    /**
     * Static method untuk membuat instance view
     * @param string $view
     * @return self
     */
    public static function make(string $view): self
    {
        return new self($view);
    }

    public static function partial(string $partial, array $data = []): void
{
    $partialPath = __DIR__ . '/../views/' . $partial . '.php';

    if (!file_exists($partialPath)) {
        throw new \Exception("Partial not found: {$partialPath}");
    }

    extract($data);
    include $partialPath;
}
}
