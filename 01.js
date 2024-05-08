document.addEventListener("DOMContentLoaded", main);
    function main() {

        document.getElementById("button-top-right").addEventListener("click", oscuro);
        
    }

    function oscuro() {
        let color = window.getComputedStyle( document.getElementById("paco")).getPropertyValue("background-color");
           if (color == 'rgb(92, 115, 115)') {
                document.getElementById("paco").style.backgroundColor = 'rgb(31, 32, 36)';
                document.getElementById("paco").style.color = 'rgb(180, 190, 201)';
                document.body.style.backgroundColor = 'rgb(75, 73, 82)';
                document.getElementById("button-top-right").innerHTML == "Modo claro";
                
            } else {
                document.getElementById("paco").style.backgroundColor = 'rgb(92, 115, 115)';
                document.getElementById("paco").style.color = 'rgb(255, 255, 255)';
                document.body.style.backgroundColor = 'rgb(222, 239, 231)';
                document.getElementById("button-top-right").innerHTML == "Modo oscuro";

            }
    }