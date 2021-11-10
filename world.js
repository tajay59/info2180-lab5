window.onload = (event) => { 

let ButtonCountry = document.querySelector("#lookup");
let ButtonCity = document.querySelector("#lookupCity");
let Result = document.querySelector("#result");
let Country = document.querySelector("#country");

ButtonCountry.addEventListener("click",()=>{
    let country = Country.value;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
      let result = this.responseText;
      console.log(result) ;
      Result.innerHTML = result;
    }
    xhttp.open("GET", `http://localhost/info2180-lab5/world.php?country=${country}&context=country`);
    xhttp.send();
});

ButtonCity.addEventListener("click",()=>{
    let city = Country.value;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
      let result = this.responseText;
      console.log(result) ;
      Result.innerHTML = result;
    }
    xhttp.open("GET", `http://localhost/info2180-lab5/world.php?country=${city}&context=cities`);
    xhttp.send();
});

}