function aujourdhui(){
    var maintenant = new Date();
    var jour=maintenant.getDate();
    var mois=maintenant.getMonth()+1;
    var an=maintenant.getFullYear();
    document.write(jour,"/",mois,"/",an);
}
