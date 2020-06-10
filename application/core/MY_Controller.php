<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        
        $this->load->library('carabiner');
        
        $carabiner_config = array(
            'script_dir' => 'asset/',
            'style_dir' => 'asset/',
            'cache_dir' => 'asset/cache/',
            // 'base_uri' => 'http://localhost/fortibumn/',
            'combine' => FALSE,
            'dev' => TRUE,
            'minify_js' => TRUE,
            'minify_css' => TRUE
        );
				
				// Global CSS
				
        $this->carabiner->config($carabiner_config);
        $css_assets_global = array(						
						array('css/animate.css'),
						array('css/bootstrap.min.css'),
						array('css/line-awesome.css'),
						array('css/line-awesome-font-awesome.min.css'),
						array('css/font-awesome.min.css'),
						array('css/jquery.mCustomScrollbar.min.css'),
						array('lib/slick/slick.css'),
						array('lib/slick/slick-theme.css'),
						array('css/style.css'),
						array('css/responsive.css'),
        );
				$this->carabiner->group('global',array('css'=>$css_assets_global));
				
				// Admin JS
				      
        $js_assets_global = array(											
						array('js/jquery.min.js'),
						array('js/popper.js'),
						array('js/bootstrap.min.js'),
						array('js/jquery.mCustomScrollbar.js'),
						array('lib/slick/slick.min.js'),
						array('js/scrollbar.js'),
						array('js/script.js'),
        );
        $this->carabiner->group('global',array('js'=>$js_assets_global));				
				
				$this->carabiner->config($carabiner_config);
        $css_assets_admin = array(						
						array('admin/vendor/fontawesome-free/css/all.min.css'),
						array('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'),						
						array('admin/css/sb-admin-2.min.css'),
						array('admin/vendor/datatables/dataTables.bootstrap4.min.css'),
        );
				
				$this->carabiner->group('admin',array('css'=>$css_assets_admin));							
	
				// Admin JS
        $js_assets_admin = array(											
						array('admin/vendor/jquery/jquery.min.js'),
						array('admin/vendor/bootstrap/js/bootstrap.bundle.min.js'),
						array('admin/vendor/jquery-easing/jquery.easing.min.js'),
						array('admin/js/sb-admin-2.min.js'),
						array('admin/vendor/datatables/jquery.dataTables.min.js'),
						array('admin/vendor/datatables/dataTables.bootstrap4.min.js'),
						array('admin/js/demo/datatables-demo.js'),
        );
        $this->carabiner->group('admin',array('js'=>$js_assets_admin));		
				
    }
}
