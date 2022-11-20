let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
Instascan.Camera.getCameras().then(function(cameras){
   if (cameras.lenght > 0) {
       alert('No se ha encontrado un camara habilitada');
    } else{
       scanner.start(cameras[0]);
   }
}).catch(function(e){
    console.error(e);
});

scanner.addListener('scan',function(c){
    document.getElementById('dni').value=c;
});