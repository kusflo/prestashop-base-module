<?php
if (!defined('_PS_VERSION_')) {
    exit;
}


class FirstModule extends  Module
{

    public function __construct()
    {
        $this->name = 'firstModule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Kusflo';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('First Module');
        $this->description = $this->l('My first module in prestashop.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        if (!Configuration::get('MYMODULE_NAME')) {
            $this->warning = $this->l('No name provided');
        }
    }


    public function install()
    {
        if(!Configuration::updateValue('MYMODULE_NAME', 'First Kusflo Module') ||
            !parent::install()
        ){
            return false;
        }

        return true;
    }


    public function uninstall()
    {
        if(!Configuration::deleteByName('MYMODULE_NAME') ||
            !parent::uninstall()
        ) {
            return false;
        }

        return true;
    }




}



