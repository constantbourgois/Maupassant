<?php class Pages extends CI_controller{



public function view($page = 'home_view')
	{

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                echo (APPPATH.'views/pages/'.$page.'.php');// Whoops, we don't have a page for that!

								show_404();
        }



				redirect('Home','refresh');

      


	}

}

?>
