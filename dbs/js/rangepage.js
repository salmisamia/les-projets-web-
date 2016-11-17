/**
 * initialisation de la range page
 */
 var cufonSiteLocal = cufonSiteLocal ? cufonSiteLocal : "";
 
window.addEvent("load", function(){
    var RP = new RangePage();
});


/**
 * 
 * class RangePage
 * 
 */

var RangePage = new Class({
    
    initialize : function(){
        
        this.rangePage = $("rangepage");
        this.content = this.rangePage;
        if(isIE8()) {
            var rangePageLayers = $$(".rangePageLayer");
            rangePageLayers.each(function(el){
                el.setStyle("visibility", "visible");
            });
        }
        
        this.setCufon();
        // this.initScrollers();
        
        var _self = this;
        Cufon.DOM.ready(function(){
            _self.initLayer();
        //this.setCufon();
        });
    },
    
    setCufon : function(){
        var toCufon = this.content.getElements("h2").concat(this.content.getElements("h3"));
        if(!localCyrillic.contains(cufonSiteLocal)){
            Cufon.replace(toCufon);
        }
    },
    
    initLayer : function(){
        
        var _self = this;
        
        _self.currentLi = null;
        
        this.allLis = this.content.getElements("li");
        this.aLayers = this.content.getElements("div.rangePageLayer");
        this.aLis = this.allLis.filter( function(el){
            return el.getElements("div.rangePageLayer").length != 0;
        });
        
        this.aLis.each(function(oLi){
            var _span = oLi.getElement('span');
            if (_span.getCoordinates().height > 25){
                oLi.addClass('specialCase');
            }
            
        })
        
        this.minHeight = this.aLayers[0].getElement("h3").getCoordinates().height;
        this.aLayers.each( function(layer){
            // gere en JS le passage sur 2 lignes du titre
            var maxh3Width = 140;
            var h3 = layer.getElement("h3")/*.setStyle('white-space', 'nowrap')*/;
            if (h3){
                var h3Width = h3.getCoordinates().width;
                if( h3Width >= maxh3Width ) {
                    //$(getParent(h3, {className:'block'})).addClass("two_lines");
                    $(getParent(h3, {className:'rangePageLayer'})).addClass("two_lines");
                    
                }
            //  h3.setStyle('white-space', '');
                
                
                
            }
            
            
            
            layer.showEffect = layer.effect("opacity", {
                onComplete : function(){
                    if(!localCyrillic.contains(cufonSiteLocal)){
                        Cufon.replace(layer.getElement('h3'));
                    }
                    
                }
            });
            /*layer.hideEffect = layer.effect("opacity", {duration:0});
            layer.hideEffect.start(0);*/
            layer.setOpacity(0)
            
            if (h3){
                /* Ajuste la position du layer pour les titres sur 2 lignes */
                var currentHeight = h3.getCoordinates().height;
                if (this.minHeight < currentHeight) this.minHeight = currentHeight;
            }
        });
        
        this.aLis.each( function(li, i){
            li.addEvents({
                "mouseenter" : function(){
                    var layer = li.getElement("div.rangePageLayer");
                    li.addClass('liHover');
                    layer.removeClass("hidden");
                    layer.showEffect.start(1);
                    
                },
                "mouseleave" : function(){
                    var layer = li.getElement("div.rangePageLayer");
                    layer.showEffect.stop();
                    li.removeClass('liHover');
                    layer.addClass("hidden");
                    layer.setOpacity(0);    
                }
            });
        });
        
        _self.adjustTitles();
    },
    
    adjustTitles : function(){      
        var _self = this;
        this.aLayers.each(function(layer, i){
            var h3 = layer.getElement("h3");
            if (h3){
                var currentHeight = h3.getCoordinates().height
                if( currentHeight > _self.minHeight ) layer.addClass("two_lines");
            }
        });
    },
    
    initScrollers : function(){
        
        var aUls = this.content.getElements(".h_scroller").getElement("ul");
        
        aUls.each(function(ul){
            var aLis = ul.getChildren();
            if (aLis.length > 4) {
                
                ul.addClass("scroll");
                aLis[0].addClass("first");
                
                var prev = new Element("a", { href:"#" }).addClass("prev");
                var next = new Element("a", { href:"#" }).addClass("next");
                ul.adopt(prev);
                ul.adopt(next);
                
                prev.addEvent("click", function(e){
                    new Event(e).stop();
                });
                
                next.addEvent("click", function(e){
                    new Event(e).stop();ch
                    
                    var children = this.getParent().getChildren();
                    
                    
                });
                
                for (var i = 4; i < aLis.length; i++) {
                    aLis[i].addClass("hidden");
                }
            }
        });
    }
    
});


/* Utils */
function isIE8 (){
    if( /MSIE 8.0/.test(navigator.userAgent) ) return true;
    return false;
}
