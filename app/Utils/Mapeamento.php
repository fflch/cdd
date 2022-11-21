<?php

namespace App\Utils;

use App\Models\Termo;

class Mapeamento
{
    public static function map($chave){
        $mapeamento = [
            'id' => 'ID',
            'normalizado' => 'Normalizado',
            'created_at ' => 'Data de Criação',
            'updated_at' => 'Data de Alteração',
            'assunto' => 'Assunto',
            'enviado_para_sibi' => 'Enviado para Sibi',
            'observacao' => 'Observacao',
            'categoria' => 'Categoria',
        ];

        return $mapeamento[$chave];
    }
}