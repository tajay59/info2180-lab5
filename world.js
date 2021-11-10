window.onload = (event) => { 

let Button = document.querySelector("#lookup");
let Result = document.querySelector("#result");
let Country = document.querySelector("#country");

Button.addEventListener("click",()=>{
    let country = Country.value;
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function() {
      let result = this.responseText;
      console.log(result) ;
      Result.innerHTML = result;
    }
    xhttp.open("GET", `http://localhost/info2180-lab5/world.php?country=${country}`);
    xhttp.send();
});


}