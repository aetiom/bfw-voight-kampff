<?php

namespace BfwVoightKampff\Helpers;

class BfwForm implements \BfwForm\Helpers\Data\DataInterface
{
    /**
     * Validate URL type value
     * 
     * @param string $value   : captcha id to validate
     * @param array  $options : not used, let empty
     * 
     * @return bool true if valid, false otherwise
     */
    static public function validate(string $value, $options = [])
    {
        $app = \BFW\Application::getInstance();
        $bfwVoightKampff = $app->getModuleList()->getModuleByName('bfw-voight-kampff');

        return $bfwVoightKampff->verifyCaptcha($value);
    }
}