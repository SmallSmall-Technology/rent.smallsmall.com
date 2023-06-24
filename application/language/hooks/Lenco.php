<?php
class Lenco {
    
    public function getDetails()
    {
        // load the instance
        $this->CI =& get_instance();
       
        // get the actual output
        
        //$contents = $this->CI->output->get_output();
        
        $values = json_decode(file_get_contents('php://input'), TRUE);
        
        print_r($values);
       
        return;
    }
}