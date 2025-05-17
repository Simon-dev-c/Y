function completerFormulaire() {
    var i = 0;
    for (i = 0; i < 31; i++) {
        document.getElementById("jour").options[i] = new Option(i+1,i+1);
    }
    var mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    for (i = 0; i < 12; i++) {
        document.getElementById("mois").options[i] = new Option(mois[i],i);  
    }   
    for (i = 1950; i <= 2000; i++) {
        document.getElementById("annee").options[i-1950] = new Option(i,i);
    }
}

function verifierDateNaissance(jour, mois, annee) {
    var j = jour.options[jour.selectedIndex].value;
    var m = mois.options[mois.selectedIndex].value;
    var a = annee.options[annee.selectedIndex].value;
    var date = new Date(a,m,j);
    if (date.getDate() != j
        || date.getMonth() != m
        || date.getFullYear() != a) {
        alert("Vous avez entré une date de naissance incorrecte, le "+j+"/"+(parseInt(m)+1)+"/"+a+" n'existe pas");
        return false;
    }
    return true;
}

document.getElementById('search').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const items = document.querySelectorAll('#menu li');

    items.forEach(item => {
        const text = item.textContent.toLowerCase();
        item.style.display = text.includes(filter) ? 'list-item' : 'none';
    });
});
