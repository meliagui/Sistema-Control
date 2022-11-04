(function(){

   var actualizarHora = function(){
    var fecha = new Date(),
        horas = fecha.getHours(),
        ampm,
        minutos = fecha.getMinutes(),
        segundos = fecha.getSeconds(),
        diaSemana = fecha.getDay(),
        dia = fecha.getDate(),
        mes = fecha.getMonth(),
        year = fecha.getFullYear();



    var pHoras = document.getElementById('horas'),
        pAMPM = document.getElementById('ampm'),
        pMinutos = document.getElementById('minutos'),
        pSegundos = document.getElementById('segundos'),
        pDiaSemana = document.getElementById('diaSemana'),
        pDia = document.getElementById('dia'),
        pMes = document.getElementById('mes'),
        pYear = document.getElementById('year');

    //var semana = ['Domingo', 'Lunes', 'Martes','Miercoles','Jueves','Viernes','Sabado'];
    pDiaSemana.textContent = diaSemana;
};
actualizarHora();

}())