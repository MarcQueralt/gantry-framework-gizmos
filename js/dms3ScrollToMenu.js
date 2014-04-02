// Per fer scroll fins al menú responsiu si es fa click sobre el botó
window.addEvent('domready', function() {
    dms3AttachScrollToMenu();
});
function dms3AttachScrollToMenu() {
    console.log('Configurant desplaçament');
    jQuery("div.gf-menu-toggle").click(function() {
        console.log('Iniciant desplaçament');
        if(!this.hasClass('active')) exit(); //when this script is called, active class is already enabled
        jQuery('html, body').animate({
            scrollTop: jQuery(".gf-menu").parent().parent().offset().top
        }, 2000);
        console.log('Desplaçament finalitzat');
    });
    console.log('Desplaçament configurat');
}