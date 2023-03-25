<?php
require_once('class.UtilsController.php');
class GeneralController extends UtilsController
{
    function __construct()
    {
        // $this->SetGeneralsScript();
        $this->SetGeneralsShortCodes();
        // $this->SetGeneralsStyles();
    }
    public function SetGeneralsShortCodes()
    {
        try {
            add_shortcode("views", [$this, 'SetGeneralsShortCodesParams']);
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function SetGeneralsShortCodesParams($atts)
    {
        try {
            $is_local = $_SERVER['HTTP_HOST'] === 'localhost:8888';
            $path = $_SERVER['DOCUMENT_ROOT'] . ($is_local ? '/mct/' : '') . '/wp-content/themes/merceriacreativatania/views/' . $atts['section'] . '/' . $atts['name'] . '.php';
            $result = $this->GetTemplatePart($path, $atts);
            return $result;
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }


    public function GetTemplatePart($path, $params = null)
    {
        try {
            if (empty($path))
                return false;
            ob_start();
            include($path);
            $view = ob_get_contents();
            ob_end_clean();
            return $view;
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function SetGeneralsStyles()
    {
        try {
            add_action('wp_enqueue_scripts', [$this, 'SetGeneralsStylesParams']);
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function SetGeneralsStylesParams()
    {
        try {
            wp_enqueue_style('customStyle', get_stylesheet_directory_uri() . '/style.css');
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function GetViewName()
    {
        try {
            global $wp, $post;
            $section = $post->post_name;

            switch ($section) {
                case 'home':
                    $section = 'home';
                    break;
                case 'footer':
                    $section = 'footer';
                    break;
                case 'product':
                    $section = 'product';
                    break;
                case 'singleproduct':
                    $section = 'singleproduct';
                    break;
            }
            return $section;
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }

    public function SetViewModuleScript($url)
    {
        try {
            return '<script defer type="module" src="' . $url . '" ></script>';
        } catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }
    }
}
