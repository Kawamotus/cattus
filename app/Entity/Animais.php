<?php

    namespace App\Entity;

    use App\Db\Database;
    use PDO;

    class Animais{
        public $ID_Animal;
        public $Nome_Animal;
        public $Especie_Animal;
        public $Sexo_Animal;
        public $Idade_Animal;
        public $Porte_Animal;
        public $DtAdmissao_Animal;
        public $Img_Animal;

        public function cadastrarAnimal(){
            $this->DtAdmissao_Animal = date("Y-m-d H:i:s");

            $obDatabase = new Database('Animal');
            $this->ID_Animal = $obDatabase->insert([
                'Nome_Animal' =>$this->Nome_Animal,
                'Especie_Animal' =>$this->Especie_Animal,
                'Sexo_Animal' =>$this->Sexo_Animal,
                'Idade_Animal' =>$this->Idade_Animal,
                'Porte_Animal' =>$this->Porte_Animal,
                'DtAdmissao_Animal' =>$this->DtAdmissao_Animal,
                'Img_Animal' =>$this->Img_Animal
                ]);

                return true;

        }

        public function atualizarAnimal(){
            return (new Database('Animal'))->update('ID_Animal = '.$this->ID_Animal,[
                'Nome_Animal' =>$this->Nome_Animal,
                'Especie_Animal' =>$this->Especie_Animal,
                'Sexo_Animal' =>$this->Sexo_Animal,
                'Idade_Animal' =>$this->Idade_Animal,
                'Porte_Animal' =>$this->Porte_Animal,
                'DtAdmissao_Animal' =>$this->DtAdmissao_Animal,
                'Img_Animal' =>$this->Img_Animal
            ]);
        }

        public function excluirAnimal(){ 
            return (new Database('Animal'))->delete('Id_Animal = '.$this->ID_Animal);
        }


        //consultas
        public static function getAnimais($where = null, $order = null, $limit = null){
            return (new Database('Animal'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getQuantidadeAnimais($where = null){
            return (new Database('Animal'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        }

        public static function getAnimal($id){
            return (new Database('Animal'))->select('ID_Animal = '.$id)->fetchObject(self::class);
        }

        public function getIdVetor(){
            return (new Database('Animal'))->select(null, null, null, "ID_Animal")->fetchAll(PDO::FETCH_CLASS, self::class); 
        }

        public function getCountId(){
            return (new Database("Animal"))->select(null, null, null, "count(ID_Animal) as qtd")->fetchObject()->qtd;
        }

        public static function getAnimais2($where = null, $order = null, $limit = null){
            //return (new Database('Animal'))->select($where, $order, $limit)->fetchObject(self::class);
            return (new Database('Animal'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class); 
        }

        public function getImgAnimal($id){
            //where order limit fields
            return (new Database('Animal'))->select('ID_Animal = '.$id,null, null, "Img_Animal")->fetchObject(self::class);
        }

        public function particiona(&$v, $inicio, $fim) {
            $pivo = $v[($inicio + $fim) / 2];
            
            while ($inicio < $fim) {
                while ($inicio < $fim && $v[$inicio] <= $pivo) {
                    $inicio = $inicio + 1;
                }
                while ($inicio < $fim && $v[$fim] > $pivo) {
                    $fim = $fim - 1;
                }
                
                $aux = $v[$inicio];
                $v[$inicio] = $v[$fim];
                $v[$fim] = $aux;
            }
            
            return $inicio;
        }
        
        public function randomQuickSort(&$v, $inicio, $fim) {
            if ($inicio < $fim) {
                $pos = $this->particiona($v, $inicio, $fim);
                $this->randomQuickSort($v, $inicio, $pos - 1);
                $this->randomQuickSort($v, $pos, $fim);
            }
        }
        
        public function imprimeVetor($v) {
            $tam = count($v);
            //echo "\n Ordem correta: v = {";
            for ($i = 0; $i < $tam; $i++) {
                //echo $v[$i] . " ";
            }
            //echo "}";
        }


    }

?>