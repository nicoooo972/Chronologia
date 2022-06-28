var n = 0;
var array = [];

function ajout() {
        n++;
        title = "#"+n+" <input type='hidden' name='ID"+n+"' value='"+n+"'> <label for='pseudo' name=''>Nom</label> :<input type='text' name='nom["+n+"]' placeholder='Titre' id='ID"+n+"'>";
        yyyy = " <label for='date'> Date :</label><input type='date' name='Date' placeholder='Date' id='ID"+n+"'>";
        biographie = "<label for='bio'>Bio</label> : <input type='text' name='bio' placeholder='Bio' id='ID"+n+"'>";

        suite = "<label for='suite'> Suite de : <select name='dmcsuite' class='suite' id='ID"+n+"> <option value='0'>--Please choose an option--</option> </select>";

        so = "<label for='so'><input type='checkbox' name='so' id='so"+n+"' /> <label for='oc'>Spin-off</label><br />";

        var l = document.getElementById("tableau").insertRow(document.getElementById("tableau").rows.length);

        var nom = l.insertCell(l.cells.length);
        nom.innerHTML = title;

        var date = l.insertCell(l.cells.length);
        date.innerHTML = yyyy;

        var bio = l.insertCell(l.cells.length);
        bio.innerHTML = biographie;

        var suitede = l.insertCell(l.cells.length);
        suitede.innerHTML = suite;

        var sode = l.insertCell(l.cells.length);
        sode.innerHTML = so;

        // Ajouter n au tableau à chaque fois

        array.push(n);
        for (let index = 0; index < array.length; index++) {
               document.getElementsByClassName("suite")[index].innerHTML = "";

        }
        console.log(array);
        for (let j = 0; j <= array.length; j++) {
                var select = document.getElementsByClassName("suite")[j];

        for(var i = 0; i < n; i++) {
                var opt = array[i];
                var el = document.createElement("option");
                el.textContent = opt ;
                el.value = opt;
                select.appendChild(el);
            }

        }
        let index = 0;
        let j = 0;
}