<?php 
class EmailTemplate
{
    var $variables = array();
    var $path_to_file= array();
    function __construct($path_to_file)
    {
         if(!file_exists($path_to_file))
         {
             trigger_error('Template File not found!',E_USER_ERROR);
             return;
         }
         $this->path_to_file = $path_to_file;
    }

    public function __set($key,$val)
    {
        $this->variables[$key] = $val;
    }


    public function compile()
    {
        ob_start();

        extract($this->variables);
        include $this->path_to_file;


        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
 ?>