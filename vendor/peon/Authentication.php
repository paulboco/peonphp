<?php

namespace Peon;

class Authentication
{
    public function check($credentials)
    {
        return isset('authenticated');
    }

}