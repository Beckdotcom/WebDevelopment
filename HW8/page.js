var top_img = "NGC6217";
var img_src = new Array ("GalaxyCluster", "M104", "NGC1300","InteractingGalaxies","M51","NGC6217");
var img_cap = new Array ("Picture of a Galaxy Cluster", "Picture of the Messier 104 (M104) The Majestic Sombrero Galaxy","Picture of the barred spiral galaxy, NGC 1300","Picture of Interacting Galaxies","Picture of the Messier 51 (M51), The Whirlpool Galaxy","Picture of the barred spiral galaxy, NGC 6217, located in the <br> Ursa Minor constellation");


function get_img () {
   var rnd_idx = Math.trunc (Math.random() * img_src.length);
   return rnd_idx;
}

function changeImg() {
    var rnd_idx = get_img();
    var new_img = img_src[rnd_idx];
    var new_cap = img_cap[rnd_idx];

    styleTop = document.getElementById(top_img).style;
    styleNew = document.getElementById(new_img).style;

    styleTop.zIndex = "0";
    styleNew.zIndex = "10";
    top_img = new_img;
   
    document.getElementById("cap").innerHTML = new_cap;
    //.innerHTML
}