<?php
function valid_form_type(array $types, array $values): bool
{
    // Même nombre d'éléments ?
    if (count($types) !== count($values)) {
        return false;
    }

    foreach ($types as $i => $expectedType) {
        $value = $values[$i];
        switch ($expectedType) {

            case 'int':
                if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    return false;
                }
                break;

            case 'float':
                if (filter_var($value, FILTER_VALIDATE_FLOAT) === false) {
                    return false;
                }
                break;

            case 'string':
                if (!is_string($value)) {
                    return false;
                }
                break;

            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                break;

            case 'url':
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    return false;
                }
                break;

            default:
                // Type inconnu → validation impossible
                return false;
        }
    }

    return true;
}
