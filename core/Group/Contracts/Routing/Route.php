<?php
namespace core\Group\Contracts\Routing;
use Container;

interface Route
{
    /**
    * set container
    *
    * @param core\Group\Container\Container container
    */
    public function setContainer(Container $container);

    /**
    * set params
    *
    * @param parameters
    */
    public function setParameters($parameters);

    /**
    * get params
    *
    * @return params name
    */
    public function getParametersName();

    /**
    * set parametersName
    *
    * @param parameters name
    */
    public function setParametersName($parametersName);

    /**
    * get parameters
    *
    * @return parameters
    */
    public function getParameters();

    /**
    * set action
    *
    * @param action
    */
    public function setAction($action);

    /**
    * get action
    *
    * @return action
    */
    public function getAction();

    /**
    * set uri
    *
    * @param uri
    */
    public function setUri($uri);

    /**
    * get uris
    *
    * @return uris
    */
    public function getUri();

    /**
    * set methods
    *
    * @param methods
    */
    public function setMethods($methods);

    /**
    * get methods
    *
    * @return methods
    */
    public function getMethods();
}
