## Consigna 2: explorar la coerción de tipos

Definicion de la funcion que utilize:

```php
function sumar($a, $b) :int {
    return $a + $b;
}
```

| Funcion | prediccion | Modo Coercitivo | Modo Estricto |
| --- | --- | --- | --- |
| sumar(1.5, 1.5) | Hace la suma con conversion automatica obteniendo flotante 3.0 y luego hacer conversion obteneiendo 3 (porque declaramos "int" como retorno de la funcion). | Un Int de valor 3 | ERROR |
| sumar(1.5, "12") | Hace la suma con conversion automatica obteniendo flotante 13.5 y luego hacer conversion obteniendo 13 (porque declaramos "int" como retorno de la funcion). | Deprecated: float 13.5 a int. Un Int de valor 13 | ERROR |
| sumar("12", "12") | Por lo mismo de antes retorna un int 24. | Un Int de valor 24 | ERROR |
| sumar("12abc", "12") | Hace la conversion a int y obtenemos un int 24. | Warning: non-numeric value. Un Int de valor 24 | ERROR |
| sumar("12abc", true) | Sin prediccion en los comentarios. | Warning: non-numeric value. Un Int de valor 13 | ERROR |
| sumar(true, 1.5) | Obtendriamos 2.5 y luego un int 2. | Deprecated: float 2.5 a int. Un Int de valor 2 | ERROR |
| sumar(true, "12") | Obtendriamos un 13 int. | Un Int de valor 13 | ERROR |
| sumar(true, null) | Obtendriamos 1. | Un Int de valor 1 | ERROR |


Los resultados fueron como esperaba.