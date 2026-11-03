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

## Consigna 3

qué hace parse con "12,50", "12.50", "12", "", "abc" y "-5", y por qué

Para 12,50 y 12.50 la funcion retorna 50. Porque asi lo defini, se tiene encuenta si viene con . y lo replaza con , y Si viene con , directamente no hace nada el replace priemero, luego con explode obtengo los centavos y se hace el casteo a int al retornar el valor. Los demas casos devuelve Null, porque no tienen centavos.

## Consigna 4

Romper algo aproposito: cambie el namesapce de App a Ap del archvo MoneyFormatter, por lo tanto no se sigue el estandar de psr-4 y no encuentra el archivo correctamente. 

PHP Fatal error:  Uncaught Error: Class "App\MoneyFormatter" not found in /Users/usuario/Desktop/Estudios/gastos-cli/bin/gastos:7
Stack trace:
#0 {main}
  thrown in /Users/usuario/Desktop/Estudios/gastos-cli/bin/gastos on line 7

Fatal error: Uncaught Error: Class "App\MoneyFormatter" not found in /Users/usuario/Desktop/Estudios/gastos-cli/bin/gastos:7
Stack trace:
#0 {main}

1- ¿Qué pasa al llamar a sumar(int $a, int $b) con "12", con y sin strict_types?
2- ¿Dónde se escribe declare(strict_types=1) y a qué llamadas afecta?
3- ¿Qué diferencia hay entre composer.json y composer.lock, y cuál de los dos se sube a Git?
4- Con el prefijo App\ apuntando a src/, ¿en qué ruta busca Composer la clase App\Money\Formatter?
5- ¿Cuándo usarías ?string y cuándo string|int?

1 Sin strict_types hace una conversion automatica de "12" a int para operar.
 con stric_types ocurrira un faltarl error de un TypeError

2 Se escribi al principio de cada archivo, afecta a las llamadas del mismo archivo

3 composer.json tiene todas la depedencias del proyecto, configuraciones e informacion basica como nombre y descripcion, autor.
el composer.lock es el controla las versiones de cada dependencia. 
ambos se suben a git para tenerlos versionados.

4 con App\ apuntando a src/ le estamos diciendo que la clase App\Money\Formatter esta en el directorio  src/Money en el archivo Formatter

5 usaria ?string cuando espero un valor de retorno string o null. y string | int cuando espero un valor de retorno string o int.


