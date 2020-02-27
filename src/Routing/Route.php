<?php
	/**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\Routing;

	/**
     * Réprésente les informations d'une route
	 * @package Ekolo\Component\Routing\Route
	 */
	class Route
	{
        /**
         * L'action à exécuter
         * @var string
         */
        protected $action;
        
        /**
         * Le controlleur à appler
         * @var string
         */
        protected $controller;
        
        /**
         * L'url que le client à demander
         * @var string
         */
        public $url;
        
        /**
         * Les noms des variables contenues dans la route
         * @var array
         */
        protected $varsNames;
        
        /**
         * Les variables contenues dans la route
         * @var array
         */
		protected $vars;

		public function __construct($url, $controller, $action, array $varsNames)
		{
			$this->setUrl($url);
			$this->setController($controller);
			$this->setAction($action);
			$this->setVarsNames($varsNames);
		}

		/**
		 * Vérifie si la route contient des variables
		 * @return bool
		 */
		public function hasVars()
		{
			return !empty($this->varsNames);
		}

		/**
		 * Vérifie si l'url pasé enparamètre correspond à celui de la route
		 * @param string $url L'url demandé
		 * @return array|bool $matches
		 */
		public function match($url)
		{
			if (preg_match('#^' . $this->url . '$#',$url, $matches)) {
				// for ($i=0; $i < count($matches); $i++) { 
				// 	if ($i > 0 && is_paire($i)) {
				// 		$matches[$i] = preg_replace('#_#', '', $matches[$i]);
				// 	}
				// }
		
				return $matches;
			}else{
				return false;
			}
		}

		/**
		 * Modifie l'action
		 * @param string|Closure $action L'action à ajouter
		 * @return void
		 */
		public function setAction($action)
		{
			$this->action = $action;
		}

		/**
		 * Modifie l'url de la route
		 * @param string $url
		 * @return void
		 */
		public function setUrl(string $url)
		{
			$this->url = $url;
		}

		/**
		 * Modifie le controller
		 * @param {string} $controller Le controlleur à ajouter
		 * @return void
		 */
		public function setController($controller)
		{
			$this->controller = $controller;
		}

		/**
		 * Modifie le nom des variables
		 * @param array $varsNames Les noms de différentes variables
		 * @param void
		 */
		public function setVarsNames(array $varsNames)
		{
			$this->varsNames = $varsNames;
		}

		/**
		 * Modifie les varaibles
		 * @param $vars
		 */
		public function setVars($vars)
		{
			$this->vars = $vars;
		}

		/**
		 * Renvoi l'action qu'il faut
		 * @return string
		 */
		public function action()
		{
			return $this->action;
		}

		/**
		 * Renvoi le nom du à appeler controller
		 * @return string $controller
		 */
		public function controller()
		{
			return $this->controller;
		}

		/**
		 * Renvoi les différentes variables
		 * @return $vars
		 */
		public function vars()
		{
			return $this->vars;
		}

		/**
		 * Renvoi les noms des variables
		 * @return array $varsNames
		 */
		public function varsNames()
		{
			return $this->varsNames;
		}
	}