<?php

    namespace App\Db;

    class Pagination{

        //número máximo de registros por página
        private $limit;

        //quantidade total de resultados do banco
        private $results;

        //quantidade de paginas
        private $pages;

        //Pagina atual
        private $currentPage;


        //construtor da classe
        //limite padrão 12
        public function __construct($results, $currentPage = 1, $limit = 12)
        {
            $this->results = $results;
            $this->limit = $limit;
            $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
            $this->calculate();
        }

        //metodo que calcula a paginação
        private function calculate(){
            //calcula total de paginas
            $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

            //verifica se a pagina atual não excede o número de páginas
            $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
        }

        //retorna a clausula limit da sql
        public function getLimit(){
            //quantidade de registros que serão "pulados"(para fazer a paginação, ex: pg 1 - resultados 1-10, pagina 2 - resultados 11-20 (os resultados anteriores precisam ser pulados))
            $offSet = ($this->limit*($this->currentPage - 1));

            //o retorno será quantos resultados devem ser pulados, o limite por página
            return $offSet.','.$this->limit;
        }

        //metodo que retorna as opções de páginas disponíveis
        public function getPages(){
            //não retorna páginas se qtd pagina = 1
            if($this->pages == 1){
                return [];
            }

            //paginas
            $paginas = [];
            for($i = 1; $i <= $this->pages; $i++){
                $paginas[] = [
                    'pagina' => $i,
                    'atual' => $i == $this->currentPage
                ];
            }

            return $paginas;
            
        }
    }

?>