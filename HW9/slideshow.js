var img_src = new Array ("img1","img2","img3","img4","img5","img6","img7","img8","img9","img10","img11");
var top_img = img_src[0]
var count = 1
var p;
var is_playing = false;


function showImg() {
    if (count == 11){
        count = 0;
    }
    var new_img = img_src[count];

    styleTop = document.getElementById(top_img).style;
    styleNew = document.getElementById(new_img).style;
    console.log(styleTop);
    console.log(styleNew);



    styleTop.zIndex = "0";
    styleNew.zIndex = "10";
    top_img = new_img;

    count+=1;

    p = setTimeout(showImg, 3000);
}

function start() {
    console.log(is_playing)
    if (is_playing == false) {
        is_playing = true;
        showImg();
    }
    console.log(is_playing)
}

function stop() {
    clearTimeout(p);
    is_playing = false;
  }
