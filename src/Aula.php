<?php
    
    namespace src;

    class Aula {
        public function buscarTiposDaAula() {
            $obj = json_decode(substr(file_get_contents("aula-teste/aula.js"),20));
            $values = [];
            foreach($obj->imports as $import) {
                $question = json_decode(rtrim(substr(file_get_contents("aula-teste/".$import),14),")"));
                echo 'id: '.$question->id.'<br>tipo: '.$question->tipo.'<br><br>';
                $mon = array("id" => $question->id, "tipo" => $question->tipo);
                array_push($values,$mon);
            }
            $fo = fopen("aulas.json","a");
            fwrite($fo,json_encode($values));
        }
    }

?>