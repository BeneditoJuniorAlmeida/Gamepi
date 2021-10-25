<?php

function tratar_documento($apostila, $anexo) {
    $padrao = '/^.+(\.pdf|\.doc)$/';
    $resultado = preg_match($padrao, $apostila['name']);

    if (!$resultado) {
        return false;
    } else {
        move_uploaded_file($apostila['tmp_name'], "midia/apostila/especies/{$apostila['name']}");
        return true;
    }
}
