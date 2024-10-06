<?php 
    // echo readfile('readme.txt');
    // $file= 'readme.txt';
    // $Delete='test.txt';
    // if(file_exists($file)){
    //     readfile($file);
    // }else{
    //     echo 'file is not exist';
    // }
    // copy($file,'qoutes.txt');
    // echo realpath($file). '<br />';
    // echo filesize($file);
    // rename($file,'text.txt');
    // $handle= fopen($file,'a+');
    // echo fread($handle, filesize($file));
    // echo fread($handle, 60);
    // echo fgets($handle);
    // echo fgetc($handle);
    // fwrite($handle," \nHello Exatly");
    // fclose($handle);
    // unlink($Delete);
    // mkdir('test');
?>

<?php 
    class User{
        private $email;
        private $name;
        public function __construct($name, $email) {
            $this->name = $name;
            $this->email = $email;
            // $this->email='abdeisty33@gmail.com'.
            // $this->name= 'abdelrahman deisty';
        }
        public function login(){
            // echo 'the user logged in: ';
            echo $this->name.' logged in';
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            if(is_string($name) && strlen($name)>1){
                $this->name = $name;
                return "name has been updated to $name";
            }else{
                return "not a vaild name";
            }
        }
    }
    // $userOne= new User();
    // $userOne->login();
    // echo ' '. $userOne->name;
    $userTwo= new User('Abdelrahman', 'abdeisty33@gmail.com');
    // echo $userTwo->name.' ';
    // echo $userTwo->email;
    // $userTwo->login();
    // echo $userTwo->getName();
    // echo $userTwo->setName(50);
    echo $userTwo->setName('khaled');
    echo $userTwo->getName();
?>