<?php

class Terminal{

    ////////////////////////////////////////////////////
    // Properties
    ////////////////////////////////////////////////////

    public $command          = '';
    public $output           = '';
    public $directory        = '';

    // Holder for commands fired by system
    public $command_exec     = '';

    ////////////////////////////////////////////////////
    // Constructor
    ////////////////////////////////////////////////////

    public function __construct(){
        if(!isset($_SESSION['dir'])){
            $this->directory = './';
            $this->ChangeDirectory();
        }else{
            $this->directory = $_SESSION['dir'];
            $this->ChangeDirectory();
        }
    }

    ////////////////////////////////////////////////////
    // Primary call
    ////////////////////////////////////////////////////

    public function Process(){
        $this->ParseCommand();
        $this->Execute();
        return $this->output;
    }

    ////////////////////////////////////////////////////
    // Parse command for special functions, blocks
    ////////////////////////////////////////////////////

    public function ParseCommand(){

        // Explode command
        $command_parts = explode(" ",$this->command);

        // Handle 'cd' command
        if(in_array('cd',$command_parts)){
            $cd_key = array_search('cd', $command_parts);
            $cd_key++;
            $this->directory = $command_parts[$cd_key];
            $this->ChangeDirectory();
            // Remove from command
            $this->command = str_replace('cd '.$this->directory,'',$this->command);
        }

        // Replace text editors with cat
        $editors = array('vi','vim','nano');
        $this->command = str_replace($editors,'cat',$this->command);

        // Handle blocked commands
        $blocked = explode(',','ssh,telnet');
        if(in_array($command_parts[0],$blocked)){
            $this->command = 'echo ERROR: Command not allowed';
        }

        // Update exec command
        $this->command_exec = $this->command . ' 2>&1';
    }

    ////////////////////////////////////////////////////
    // Chnage Directory
    ////////////////////////////////////////////////////

    public function ChangeDirectory(){
        chdir($this->directory);
        // Store new directory
        $_SESSION['dir'] = exec('pwd');
    }

    ////////////////////////////////////////////////////
    // Execute commands
    ////////////////////////////////////////////////////

    public function Execute(){





        //system
        if(function_exists('system')){
            ob_start();
            system($this->command_exec);
            $this->output = ob_get_contents();
            ob_end_clean();
        }
        //passthru
        else if(function_exists('passthru')){
            ob_start();
            passthru($this->command_exec);
            $this->output = ob_get_contents();
            ob_end_clean();
        }
        //exec
        else if(function_exists('exec')){
            exec($this->command_exec , $this->output);
            $this->output = implode("\n" , $output);
        }
        //shell_exec
        else if(function_exists('shell_exec')){
            $this->output = shell_exec($this->command_exec);
        }
        // no support
        else{
            $this->output = 'Command execution not possible on this system';
        }
    }

}