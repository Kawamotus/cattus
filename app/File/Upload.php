<?php

    namespace App\File;

    class Upload{

        private $name;
        private $extension;
        private $type;
        private $tmpName;
        private $error;
        private $size;
        private $duplicates = 0;
        
        public function __construct($file){

            $this->type = $file["type"];
            $this->tmpName = $file["tmp_name"];
            $this->error = $file["error"];
            $this->size = $file["size"];

            $info = pathinfo($file['name']);
            $this->name = $info['filename'];
            $this->extension = $info['extension'];

        }

        public function generateNewName(){
            $this->name = time().'-'.rand(00000, 99999).'-'.uniqid();
        }

        public function getBaseName(){
            $extension = !empty($this->extension) ? '.'.$this->extension :'';
            $duplicates = $this->duplicates > 0 ? '-'.$this->duplicates : '';

            return $this->name.$duplicates.$extension;
        }

        public function upload($dir){
            if($this->error !== 0){
                return false;
            }

            else{
                $path = $dir.'/'.$this->getBaseName();

                return move_uploaded_file($this->tmpName, $path);
            }
        }

        public function getName(){
            return $this->name;
        }

        public function getExtension(){
            return $this->extension;
        }
    }

?>