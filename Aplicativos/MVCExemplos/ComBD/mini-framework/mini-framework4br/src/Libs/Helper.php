<?php

namespace Mini\Libs;

class Helper
{
    /**
     * debugPDO
     *
     * Mostra a consulta SQL emulada em uma instrução PDO. O que ele faz é extremamente simples, mas poderoso:
     * Combina a consulta bruta e os espaços reservados. Com certeza não é realmente perfeito (como a DOP é mais complexa do que apenas
     * combinando consultas e argumentos brutos), mas funciona.
     *
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    static public function debugPDO($raw_sql, $parameters) {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }


        echo "<br> [DEBUG] Chaves:<pre>";
        print_r($keys);

        echo "\n[DEBUG] Valores: ";
        print_r($values);
        echo "</pre>";


        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }

}
