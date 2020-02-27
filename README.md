# eko-routing

Module PHP permettant de faire la routing des urls

## Installation

Pour l'installer vous devez à avoir déjà composer installé. Si ce n'est pas le cas aller sur  [Composer](https://getcomposer.org/)

```bash
$ composer require ekolo/eko-routing
```

## API

Permet de faire la routing des routes (urls)

### Router

C'est la classe qui permet de faire la routing.

Exemple
```php
use Ekolo\Component\Routing\Router;

$router = new Router;
```

#### Router::get($url, $callback)

Permet de router les requêtes de type `GET`

```php
$router->get('/', function () {
    echo "Hello world";
});

$router->get('/users', function () {
    echo "Liste des utilisateurs";
});

// Quand il faut mettre une variable
$router->get('/users/:id', function () {
    echo "Liste des utilisateurs";
});

$url = $_SERVER['REQUEST_URI'] // '/users/3';
$method = $_SERVER['REQUEST_METHOD'];

if ($route = $router->getRoute($method, $url)) {
    $route->action()();
    print_r($route->vars()); 
    /* 
        Array (
            [url] => /users/3
            [id] => 3
        )
    */
}
```

#### Router::post($url, $callback)

Traque les routes de type `POST`, mais la logique reste la même comme dans `get`

#### Router::put($url, $callback)

Traque les routes de type `PUT`, mais la logique reste la même comme dans les précédents méthodes

#### Router::delete($url, $callback)

Traque les routes de type `DELETE`, mais la logique reste la même comme dans les précédents méthodes