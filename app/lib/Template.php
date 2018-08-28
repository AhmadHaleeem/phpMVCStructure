<?php

namespace PHPMVC\LIB;

class Template
{
    private $_templateParts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts)
    {
        $this->_templateParts = $parts;
    }

    public function setActionViewFile($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }

    public function setAppData($data)
    {
        $this->_data = $data;
    }

    private function renderTemplateStart()
    {
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateEnd()
    {
        require_once TEMPLATE_PATH . 'templateheaderhend.php';
    }

    private function renderTemplateFooter()
    {
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    private function renderTemplateBlocks()
    {
        if (!array_key_exists('template', $this->_templateParts)) {
            trigger_error('Sorry you have to define the template blocks', E_USER_WARNING);
        } else {
            $parts = $this->_templateParts['template'];
            if (!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $partKey => $file) {
                    if ($partKey === ':view') {
                        require_once $this->_action_view;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    public function renderHeaderResources()
    {
        $output = '';
        if (!array_key_exists('header_resources', $this->_templateParts)) {
            trigger_error('Sorry you have to define the header resources', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['header_resources'];
            // Generate css links
            $css = $resources['css'];
            if (!empty($css)) {
                foreach ($css as $cssKey => $path) {
                    $output .= '<link rel="stylesheet" type="text/css" href="' . $path . '">';
                }
            }
        }
        echo $output;
    }

    public function renderFooterResources()
    {
        $output = '';
        if (!array_key_exists('footer_resources', $this->_templateParts)) {
            trigger_error('Sorry you have to define the footer resources', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['footer_resources'];
            // Generate js scripts
            $js = $resources;
            if (!empty($js)) {
                foreach ($js as $jsKey => $path) {
                    $output .= '<script src="' . $path . '"></script>';
                }
            }
        }
        echo $output;
    }

    public function renderApp()
    {
        $this->renderTemplateStart();
        $this->renderHeaderResources();
        $this->renderTemplateEnd();

        $this->renderTemplateBlocks();

        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }
}