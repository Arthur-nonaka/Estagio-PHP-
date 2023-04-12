<?php

namespace src;

class Aula
{
    public function buscarTiposDaAula()
    {
        $class = scandir("aulas");
        $json = [];
        for ($x = 2; $x < sizeof($class); $x++) {
            echo $class[$x] . "<br>";
            $obj = json_decode(substr(file_get_contents("aulas/" . $class[$x] . "/aula.js"), 20));
            $values = [];
            foreach ($obj->imports as $import) {
                $question = json_decode(rtrim(substr(file_get_contents("aulas/" . $class[$x] . "/" . $import), 14), ")"));
                echo 'id: ' . $question->id . '<br>tipo: ' . $question->tipo . '<br><br>';
                $mon = array("id" => $question->id, "tipo" => $question->tipo);
                array_push($values, $mon);
            }
            $mon2 = array($class[$x] => $values);
            array_push($json, $mon2);
            echo "<hr>";
        }
        $fo = fopen("aulas.json", "w");
        fwrite($fo, json_encode($json));
    }
}
