if(navigator.serviceWorker){
    console.log("Se aceptó el SW");
    navigator.serviceWorker.register('./sw.js')
        .then(resp => console.log("Todo bien", resp))
        .catch(error => console.log("Algo mal", error))
}else{
    console.log("No aceptó el SW");
}