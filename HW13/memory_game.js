//var grid = ["A","B","C","D","1","2","3","4","1","2","3","4","A","B","C","D"];
var grid = ["☺","♥","♦","♣","♠","☼","✩","Ω","♠","☼","✩","Ω","☺","♥","♦","♣"];

var tries = 0;
var first_look;
var second_look;
var click = 0;
var span_id1;
var span_id2;

shuffle(grid);

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


$(document).ready(function() {

    //grid in buttons, hide span
    for (i=0; i < grid.length; i++){ 
        var span_id = "button.span"+i+" span";
        $(span_id).text(grid[i]);
        
    }

    //on click, fade in the fade out
    $("button").click(function() {
        console.log(tries);

        if (click < 2){
             
            var num_id = $(this).attr('class');
            //var span_id = "button."+num_id+" span";

            var idx = num_id.slice(4);    
            //first click = first look, tries counted
            //console.log(click);
            if (click == 0) {
                first_look = idx;
                click += 1;
                tries +=1;
                //fadeout
                span_id1 = "button.span"+first_look+" span";
                $(span_id1).fadeIn();
                $(span_id1).click(false);
                $(span_id1).fadeOut(3000,function(){
                click = 0; 
                });
                
            }
            //second click = second look, call match
            else if (click == 1){
                second_look = idx;
                click += 1;
                //fadeout
                span_id2 = "button.span"+ second_look+" span";
                span_id1 = "button.span"+first_look+" span";
                $(span_id2).fadeIn();
                $(span_id2).click(false);
                $(span_id2).fadeOut(3000,function(){
                    clicks = 0;
                });
                if (match(first_look,second_look) == true){
                    //console.log("matched up in this bitch")
                    click = 0;
                    $(span_id1).stop(true,true);
                    $(span_id2).stop(true,true);
                    $(span_id1).fadeIn();
                    $(span_id2).fadeIn();
                }
                else{
                    first_look = undefined;
                    second_look = undefined;
                }

            }
  
        }

        finish()
    });
    
    
    
});


function match(num1,num2){
    if ( grid[num1] == grid[num2]){
        return true;
    }
    else{
        return false;
    }
}

function finish() {
    if ($('span:hidden').length == 0){
        alert("Tries: " + tries);
    }
}



