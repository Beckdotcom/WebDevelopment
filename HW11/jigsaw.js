// Define variables for the values computed by the grabber event  handler but needed by mover event handler
var g;
//puzzle pieces
//have to move one index to make loop even
var puzzleSet = [["puzzle1/img1-1.jpg","puzzle1/img1-2.jpg","puzzle1/img1-3.jpg","puzzle1/img1-4.jpg","puzzle1/img1-5.jpg",
                    "puzzle1/img1-6.jpg","puzzle1/img1-7.jpg","puzzle1/img1-8.jpg","puzzle1/img1-9.jpg","puzzle1/img1-10.jpg",
                    "puzzle1/img1-11.jpg","puzzle1/img1-12.jpg"] //set one
                    ,["puzzle2/img2-1.jpg","puzzle2/img2-2.jpg","puzzle2/img2-3.jpg","puzzle2/img2-4.jpg","puzzle2/img2-5.jpg",
                    "puzzle2/img2-6.jpg","puzzle2/img2-7.jpg","puzzle2/img2-8.jpg","puzzle2/img2-9.jpg","puzzle2/img2-10.jpg",
                    "puzzle2/img2-11.jpg","puzzle2/img2-12.jpg"]//set two
                    ,["puzzle3/img3-1.jpg","puzzle3/img3-2.jpg","puzzle3/img3-3.jpg","puzzle3/img3-4.jpg",
                    "puzzle3/img3-5.jpg","puzzle3/img3-6.jpg","puzzle3/img3-7.jpg","puzzle3/img3-8.jpg","puzzle3/img3-9.jpg",
                    "puzzle3/img3-10.jpg","puzzle3/img3-11.jpg","puzzle3/img3-12.jpg"]//set three

] 
var set = Math.floor(Math.random() * (2 + 1));

//on load, begins several functions
function start() {
    generate(set)
    myTimer = setInterval(myCounter, 1000)
}



function generate(set) {

    var i;

    //randomly generate puzzle



    //get puzzle pieces
    var pieces = puzzleSet[set]
    
    //shuffle puzzle order, randomize
    var shuffledPieces = shuffle(pieces)
    //place pieces in img span order
    for ( i = 1; i <= shuffledPieces.length; i++) {
        
        const temp = "img" + i 
        if (i == 12){
            document.getElementById(temp).src = shuffledPieces[0];
        }
        else{
            document.getElementById(temp).src = shuffledPieces[i];
        }
        
    }
    
}

//shuffles an array
function shuffle(array) {
    for (var i = array.length - 1; i > 0; i--) { 
     
        // Generate random number 
        var j = Math.floor(Math.random() * (i + 1));
                     
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
         
    return array;
}

// The event handler function for grabbing the word
function grabber(event) {

   // Set the global variable for the element to be moved
   theElement = event.currentTarget;

   // Determine the position of the word to be grabbed, first removing the units from left and top
   posX = parseInt(theElement.style.left);
   posY = parseInt(theElement.style.top);

   // Compute the difference between where it is and where the mouse click occurred
   diffX = event.clientX - posX;
   diffY = event.clientY - posY;

   // Now register the event handlers for moving and dropping the word
   document.addEventListener("mousemove", mover, true);
   document.addEventListener("mouseup", dropper, true);

}

// The event handler function for moving the word
function mover(event) {
   // Compute the new position, add the units, and move the word
   theElement.style.left = (event.clientX - diffX) + "px";
   theElement.style.top = (event.clientY - diffY) + "px";
}

// The event handler function for dropping the word
function dropper(event) {
   // Unregister the event handlers for mouseup and mousemove
   document.removeEventListener("mouseup", dropper, true);
   document.removeEventListener("mousemove", mover, true);
}


var mins = 0;
var secs = 0;
function myCounter() {

    if (secs == 60){
        mins +=1
        secs = 0
    }
    else{
        secs++
    }
    
  document.getElementById("mins").innerText = mins
  document.getElementById("sec").innerText = secs
}


/*
function stop() {
    
    correct()
}

function correct(){

    console.log(position())
    if (position(puzzleSet[set])){
        document.getElementById("message").innerText = "Nice!"
    }
    else{
        document.getElementById("message").innerText = "Oops!"
    }

}

function position() {
    //if imgX is too far left/right and too far up/down, then false
    console.log("here",parseInt(document.getElementById("img_1").style.left), parseInt(document.getElementById("img_1").style.top))
    // top: 50px; left:   0px;
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
        ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) < -325)) ){
            return false
        }
    if (((parseInt(document.getElementById("img_2").style.left) < 175) || (parseInt(document.getElementById("img_2").style.left) < -225)) &&
    ((parseInt(document.getElementById("img_2").style.top) < -375) || (parseInt(document.getElementById("img_2").style.top) < -425)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
        ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
            return false
        }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }

    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    if (((parseInt(document.getElementById("img_1").style.left) < 75) || (parseInt(document.getElementById("img_1").style.left) > 125)) &&
    ((parseInt(document.getElementById("img_1").style.top) < -275) || (parseInt(document.getElementById("img_1").style.top) > -325)) ){
        return false
    }
    // top: 50px; left:  100px;" 
    // top: 50px; left: 200px;"
    // top: 50px; left: 300px;
    // top: 50px; left: 400px;
    // top: 50px; left: 500px
    // top: 150px; left:   0px;
    // top: 150px; left: 100px;
    // top: 150px; left: 200px;
    // top: 150px; left: 300px;
    // top: 150px; left: 400px;
    // top: 150px; left: 500px;
    else{
        return true;
    }
}
*/
