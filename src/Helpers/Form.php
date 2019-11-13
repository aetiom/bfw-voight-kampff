<?php

namespace BfwVoightKampff\Helpers;

class Form
{
    /**
     * Validate URL type value
     * 
     * @param string $value : URL to validate
     * @return bool true if valid, false otherwise
     */
    static public function validate(string $id)
    {
        $app = \BFW\Application::getInstance();
        $bfwVoightKampff = $app->getModuleList()->getModuleByName('bfw-voight-kampff');

        return $bfwVoightKampff->verifyCaptcha($id);
    }
}