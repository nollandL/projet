
        function validateForm() {
            var nom = document.getElementById("nom").value;
            var prenom = document.getElementById("prenom").value;
            var sujet = document.getElementById("sujet").value;

            var Errors = document.getElementsByClassName("error");
            var res=true;
        
            var regex = /^[A-Za-z\s]+$/;

            if (!/^[A-Za-z\s]+$/.test(nom)) {
                Errors[0].textContent = "Le nom ne doit contenir que des lettres et des espaces.";
                document.getElementById("nom").style.border = "1px solid red";

                res=false;
            }

            if (!/^[A-Za-z\s]+$/.test(prenom)) {
                Errors[1].textContent = "Le prénom ne doit contenir que des lettres et des espaces.";
                document.getElementById("prenom").style.border = "1px solid red";
                res=false;
            }

           
            if (/[^\w\s]/.test(sujet)) {
                Errors[2].textContent = "Le sujet ne doit contenir que des lettres, des chiffres et des espaces.";
                document.getElementById("sujet").style.border = "1px solid red";
                res = false;
            }
            
            
            

            return res;
            }   
