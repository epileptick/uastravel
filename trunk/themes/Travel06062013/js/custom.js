$("#wrapper").delegate("#wrapper .row", "mouseout mouseover", function(m) {
if (m.type == 'mouseover') {
$("#wrapper .row").not(this).dequeue().animate({opacity: 0.7}, 400);
} else {
$("#wrapper .row").not(this).dequeue().animate({opacity: 1}, 400);}
}); 
