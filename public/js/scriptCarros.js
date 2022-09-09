const campoBodega = document.querySelector("#bodega");
const ciudadAlmacen = document.querySelector("#ciudadAlmacenamiento");
const valorMatricula = document.querySelector("#matricula");
const valorModelo = document.querySelector("#carroModelo");
const datoVin = document.querySelector("#vinVehiculo");
const ArraydigitoPlaca = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "J",
    "K",
    "L",
    "M",
    "N",
    "P",
    "R",
    "S",
    "T",
    "V",
    "W",
    "X",
    "Y",
    "1",
    "2",
    "3",
    "4",
    "5",
    "6",
    "7",
    "8",
    "9",
];
//3G1SF2ZA7CS111357
cargarEventListeners();

function cargarEventListeners() {
    campoBodega.addEventListener("change", filtroCiudad);
    valorMatricula.addEventListener("change", arrayDato);
    datoVin.addEventListener("blur", habilitarMatricula);
}

function filtroCiudad() {
    let idBod = campoBodega.value;
    dataBodega = JSON.parse(data);
    const arrayBodega = dataBodega.filter((bodega) => bodega.idBodega == idBod);

    const ciudadBodega = arrayBodega.forEach((ciudad) => {
        ciudadAlmacen.setAttribute("value", ciudad.ciudadBodega);
    });
}

function arrayDato() {
    let dato = datoVin.value;
    let valor = dato.split("");
    if (valor.length >= 17) {
        for (let i = 9; i < 10; i++) {
            let digitoVin = valor[i];
            rangoFecha(digitoVin);
        }
    }
}

function habilitarMatricula() {
    const datoV = datoVin.value;
    if (datoV.length >= 17) {
        valorMatricula.disable = "false";
    }
    console.log(datoV.length);
}

function rangoFecha(digitoVin) {
    const currentTime = new Date();
    const year = currentTime.getFullYear();
    let digito = digitoVin;
    if (year <= 2009) {
        const inicioCiclo = 2009 - 30;
        valorFecha(inicioCiclo, digito);
    } else if (year > 2009 && year <= 2039) {
        const inicioCiclo = 2010;
        valorFecha(inicioCiclo, digito);
    } else if (year > 2039) {
        const inicioCiclo = 2040;
        valorFecha(inicioCiclo, digito);
    }
}

function valorFecha(inicioCiclo, digito) {
    let contador = 0;
    let vin = digito;
    const resultado = ArraydigitoPlaca.forEach((caracter) => {
        contador = contador + 1;
        if (caracter == vin) {
            const calculo = inicioCiclo + contador - 1;
            valorModelo.setAttribute("value", calculo);
        }
    });
}
