
function validarTexto(input, patron) {
    var texto = input.value
    var letras = texto.split("")
    for (var x in letras) {
        var letra = letras[x]
        if (!(new RegExp(patron, "i")).test(letra)) {
            letras[x] = ""
        }
    }
    input.value = letras.join("")
}    