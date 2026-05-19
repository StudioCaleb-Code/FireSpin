<?php
namespace App\Core;

class Router
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];
    protected $namespace = 'App\\Controllers\\';

    public function __construct()
    {
        $url = $this->parseUrl();

        // 1. Determinar Namespace y Carpeta (Detectar 'Panel')
        if (isset($url[0]) && strtolower($url[0]) === 'panel') {
            $this->namespace = 'App\\Controllers\\Panel\\';
            $folder = 'Panel';
            
            $controllerName = (isset($url[1]) && !empty($url[1])) 
                ? ucfirst($url[1]) . 'Controller' 
                : 'DashboardController';
            
            unset($url[0], $url[1]); // Limpiamos para que no afecte a los parámetros
        } else {
            $this->namespace = 'App\\Controllers\\';
            $folder = '';
            
            $controllerName = (isset($url[0]) && !empty($url[0])) 
                ? ucfirst($url[0]) . 'Controller' 
                : 'HomeController';
            
            unset($url[0]);
        }

        // 2. Construir ruta de archivo física de forma limpia
        if ($folder !== '') {
            $fileCheck = APP_PATH . 'Controllers' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $controllerName . '.php';
        } else {
            $fileCheck = APP_PATH . 'Controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';
        }

        // 3. Cargar el controlador
        if (file_exists($fileCheck)) {
            $fullClass = $this->namespace . $controllerName;
            
            if (class_exists($fullClass)) {
                $this->controller = new $fullClass;
            } else {
                die("Error: La clase [$fullClass] no fue encontrada. Revisa el Namespace en el archivo.");
            }
        } else {
            die("Error: El controlador no existe. Buscando en: <br> $fileCheck");
        }

        // 4. Determinar el Método (AQUÍ ESTÁ LA CORRECCIÓN INTELIGENTE)
        $url = array_values($url); // Resetear índices del array

        // CASO ESPECIAL: Si entran a la ruleta pública (ej: ruleta/sorteo-mama)
        if ($controllerName === 'RuletaController') {
            // Forzamos a que entre al método 'detalle' que creamos
            $this->method = 'detalle';
            // Todo lo que quede en la URL (los índices restantes) serán los parámetros (el slug)
        } else {
            // Comportamiento normal para el resto de controladores y para el Panel
            if (isset($url[0]) && !empty($url[0])) {
                if (method_exists($this->controller, $url[0])) {
                    $this->method = $url[0];
                    unset($url[0]);
                }
            }
        }

        // 5. Ejecutar con parámetros restantes
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}