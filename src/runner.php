<?php

$config = $this->getConfig();

$this->captcha = [];

$this->createCaptcha = function($id) use($config) {
    $app = \BFW\Application::getInstance();

    $param = $config->getConfigByFilename('config.php');
    $param['pool'] = $config->getValue('pool', 'pool.php');
    
    $param['debug'] = $app->getConfig()->getValue('debug', 'global.php');

    $this->captcha[$id] = new \VoightKampff\Captcha($id, $param);

    /*
    if ($app->getModuleList()->hasModule('bfw-scribe')) {
        $bfwScribe = $app->getModuleList()->getModuleByName('bfw-scribe');
        $bfwScribe->handler->addCollection('captcha-'.$id, $captcha->getCollection());
    }
    */
    
    return $this->captcha[$id];
};

$this->getCaptcha = function($id) {
    if (!isset($this->captcha[$id])) {
        return null;
    }

    return $this->captcha[$id];
};

$this->verifyCaptcha = function($id) {
    $captcha = $this->getCaptcha($id);

    if ($captcha === null) {
        return null;
    }

    return $captcha->verify();
};