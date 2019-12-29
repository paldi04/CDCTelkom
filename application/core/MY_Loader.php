<?php

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('templates/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('templates/footer', $vars, $return);

        return $content;
    else:
        $this->view('template/header', $vars);
        $this->view($template_name, $vars);
        $this->view('template/footer', $vars);
    endif;
    }

    function create_uid(){
  	 	$ref = microtime(true);
  	 	$sec = $ref | 0;
  	 	return sprintf("%d%'08d", $sec, ($ref - $sec) * 100000000);
  	}
}
#NGE LOAD NYA
// $this->load->template('body');
