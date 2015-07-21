var menu = document.getElementById("menu");
var menuButton = document.getElementById("menuButton");
var container = document.getElementById("container");
var blinkingArrows = document.getElementById("blinkingArrowContainer");
var bd = document.body;


menuButton.onclick = function(){
    this.classList.toggle("expanded");
    blinkingArrows.classList.toggle("expanded");
    menu.classList.toggle("slideLeft");
    container.classList.toggle("slideLeft");
    container.classList.toggle("semiOpaque");
};

var mc = new Hammer(bd);

mc.on("swipeleft", function() {
    if(!menu.classList.contains("slideLeft"))
        menuButton.click();
});
mc.on("swiperight", function() {
    if(menu.classList.contains("slideLeft"))
        menuButton.click();
});