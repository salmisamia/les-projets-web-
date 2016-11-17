/**
	TODO 
		inject loading structure
		wait (bool)
*/

var LayerPopIn = new Class({
	
	//Implements: [Options, Events],

	options: {
		onStartOpen: Class.empty, // au lancement de l'ouverture
		onCompleteOpen: Class.empty, // a l'ouverture complete
		onStartClose: Class.empty, // au lancement de la fermeture
		onCompleteClose: Class.empty, // a la fermeture complete
		duration: 200, // duree anim
		styles: {
			opacity: 0.6
		}, // objet de style pour le fog
		ifrstyles : {
			height: 300,
			border: 0
		},
		locked: false, // a tres, empeche la fermeture du layer au clic 
		noAnimation: false, // n'effectue pas d'effet de fondu,
		setTo: null, // element sur lequel positionner le layer , defaut <body>
		loading: false, 
		keepClose: false, // ne pas ouvrir le layer (pour une ouverture manuelle)
		name : "", // nom de l'element, sert dans FogBox.js
		ie6FixedPosition: true, // simule le position:fixed sur ie (gourmand setInterval)
		content: null, // node | string html
		iframeSrc: null,
		ajaxText: null,
		ajaxJSON: null,
		template: null, // template a utliser substitute avec JSON replace #FOG-CONTENT avec HTML
		ajaxNoCache: false,
		ajaxOptions: null, // option de l'object Request a utiliser, ne pas modifier le onComplete ou le onSuccess
		widthLayer : false,
		classPopin : "layerpopin",
		optionalClassPopin : "",
		fullscreen : false,
		closeText : null
	},
	
	setContent: function (content){
		this.contentType = $type(content);
		this.ctnElement = new Element('div');

		var txt_layerPopin_close = this.options.closeText;
		switch(this.contentType){
			case "element":
				if(this.options.template){
					var d = new Element("div");
					d.innerHTML = this.options.template;
					$(document.body).adopt(d);
					$('FOG-CONTENT').replaceWith(content);
					this.ctnElement = d;
				}
				else {
					this.ctnElement.innerHTML = content.innerHTML;
				}
				break;
			case "object":
				break;
			case "string":
				if(this.options.template){
					this.ctnElement = new Element('div');
					if(/__FOGCONTENT__/)
					{
						var c = /__FOGCONTENT__/;
					}
					this.ctnElement.innerHTML = c;
				}
				else {
					
					this.ctnElement.innerHTML = content;
				}
				break;
				
		}
		
		var ctn = this.ctnElement.innerHTML;
		ctn = ctn.replace(/id=(")?((\w|\d|\.|\-)*)/g, 'id=$1$2_inpopin');
		ctn = ctn.replace(/for=(")?((\w|\d|\.|\-)*)/g, 'for=$1$2_inpopin');
		$(document.body).adopt(this.ctnElement);
    
		if(!this.ctnElement.hasClass(this.options.optionalClassPopin)){
		  this.ctnElement.addClass(this.options.optionalClassPopin);
		}
		
		if(!this.ctnElement.hasClass(this.options.classPopin) && !this.ctnElement.getElement("."+this.options.classPopin)) 
			this.ctnElement.addClass(this.options.classPopin);
		
       if(typeof(txt_layerPopin_close)=='undefined') {
            var txt_layerPopin_close = ' ';
       }
	   
       
		this.buildPopMarkup(ctn,txt_layerPopin_close);
		
		if(!this.options.keepClose) this.open();
        

	},
	
	buildPopMarkup: function(ctn,txt_layerPopin_close)
	{
		
		var l = $(document.body).getElements('.'+this.options.classPopin), lay = l[0];
		lay.innerHTML = ''; 
		var layContent = ctn;
		
		var markupClass = ['layerHead', 'layerBody', 'layerFooter']; 
		
		for ( var i=0, d; i< markupClass.length; i++)
		{
			d = new Element('div',{ 'class': markupClass[i] });
			lay.adopt(d);
		}
		
		var cl = new Element('button', { 'class' : 'layerClose' });

		cl.setText(txt_layerPopin_close);
		
		var layHead = lay.getElements('.layerHead');
		layHead[0].adopt(cl);
		
		var layBody = lay.getElements('.layerBody'), container = new Element('div');
		
		container.innerHTML = layContent;
        container.className = 'layerContainer';
		layBody[0].adopt(container);
	},
	
	initialize : function (options){
		this.setOptions(options)
		
		// ferme par defaut
		this.isOpen = false;
		this.onDom = false;
		// creation de la structure
		this.elm = new Element("div", {'class': 'fog hidden'});
		
	//	this.elm.store("FogManager", this);
		
		// ifr pour ie6
		if(window.ie6){
			this.ifr = new Element('iframe');
			this.ifr.src = "javascript:false";
			$(document.body).adopt(this.ifr);
		}
		$(document.body).adopt(this.elm);
		this.get_CSS_style();
		
		this.elm.setStyles(this.options.styles);
		
		
		//console.log(this.options)
		// recuperation du contenu
		switch(true){
			case this.options.ajaxText != null:
				
				new XHR(
				{
					noCache: this.options.ajaxNoCache,
					onSuccess:	
						function (oSelf){
							return function(responseText, responseXML){
								oSelf.setContent(responseText);
							}
						}(this)
				}).send(this.options.ajaxText);
				break;
			case this.options.ajaxJSON != null:
				
				new XHR(
				{
					noCache: this.options.ajaxNoCache,
					onSuccess:	
						function (oSelf){
							return function(responseJSON, responseText){
								oSelf.setContent(responseJSON);
							}
						}(this)
				}).send(this.options.ajaxText);
				break;
			case this.options.content != null:
				if($type(this.options.content) == "element") {
					this.onDom = true;
					this.options.template = null;
				}
				this.setContent(this.options.content);
				break;
			case this.options.iframeSrc != null:
				this.setContent(new Element('iframe', {'src': this.options.iframeSrc, 'styles':this.options.ifrstyles, 'frameborder':0}));
				break;
			default:
				if(this.options.loading) this.wait(true);
				this.onDom = true;
				this.open();
		}
		
		// au resize, on repositionne
		/*Notifier.addEvent("onLayoutChanged", function (){
			this.setToElm(this.lastElm);
		}.bind(this))*/
		
		window.addEvent("resize", function (){
			this.setToElm(this.lastElm);
		}.bind(this))
		
		// fermeture definitive
		this.addEvent('onCompleteClose', 
			function (){
				// destruction
				if(!this.elm) return;
				this.isOpen = false;
				this.elm.remove();
				//if(!this.onDom) this.ctnElement.remove();
				this.ctnElement.remove();
				if(this.interval) clearInterval(this.interval);
				if(this.ifr) this.ifr.remove();
			}
		)
		this.addEvent('onCompleteOpen', function(){
			setCufonPopin(this.ctnElement);   
            
            //console.info($E('.skinnedCheck',$(this.ctnElement)));
            
            new elRadioCheck({element : 'skinnedCheck', activeClass : 'skinnedCheckActive',container:$(this.ctnElement)});  

			layerPopinOnComplete(this.ctnElement);
		});
		
		if(!this.options.locked) this.elm.addEvent('click', function (){this.close();}.bind(this));
	},
	
	get_CSS_style: function (){
	
		if(!this.options.styles) this.options.styles = {};
		if(!this.options.styles.backgroundColor) this.options.styles.backgroundColor = this.elm.getStyle("backgroundColor");
		if(!this.options.styles.opacity) this.options.styles.opacity = this.elm.getStyle('opacity');
	},
    
	toggle: function(){
		this.isOpen == true ? this.close() : this.open();
	},

	open: function (){
		this.fireEvent("onStartOpen", this.elm, $(this.options.setTo));
		this.setToElm();
		
		if(this.options.noAnimation) {
			this.elm.removeClass('hidden');
			this.ctnElement.removeClass('hidden');
			
			if(this.options.widthLayer != false)
				this.ctnElement.setStyle("width", this.options.widthLayer);
			this.ctnElement.setStyle("marginLeft", -this.ctnElement.offsetWidth/2)
			this.ctnElement.setStyle("marginTop", -this.ctnElement.offsetHeight/2)
			this.ctnElement.setStyle("opacity", "1")
			this.ctnElement.getElements(".layerClose").addEvent("click", function (e){new Event(e).stop();this.close();}.bind(this))
			this.ctnElement.getElements(".closeIt").addEvent("click", function (e){new Event(e).stop();this.close();}.bind(this))
			this.fireEvent("onCompleteOpen", this.elm, $(this.options.setTo));
			return;
		}
		
		
		if(this.ctnElement){
						
			elm = $(this.ctnElement);
			
			
			if(this.options.widthLayer != false)
				this.ctnElement.setStyle("width", this.options.widthLayer);
			
			try {elm.getElements(".layerClose").addEvent("click", function (e){new Event(e).stop();this.close();}.bind(this))}
			catch(e){}
			try {elm.getElements(".closeIt").addEvent("click", function (e){new Event(e).stop();this.close();}.bind(this))}
			catch(e){}
			
			// ajout de l'anim sur le ctn
			this.currentContent = elm;
			var self = this;
			var myFx2 = new Fx.Style(elm, "opacity", {
				onStart: function (){
					this.element.removeClass("hidden");
			
					if(self.options.fullscreen){
						this.element.setStyles({
							width : "98%",
							height : "98%",
							margin : "1%",
							left: 0,
							top:0

						});
					} else {
						this.element.setStyle("marginLeft", -this.element.offsetWidth/2)
						this.element.setStyle("marginTop", -this.element.offsetHeight/2)
					}
					
				},
				duration: this.options.duration
			});
			
			myFx2.set(0);
			myFx2.addEvent("complete",function(){
				self.fireEvent("onCompleteOpen", self.elm, $(self.options.setTo));
			});
			myFx2.start(0, 1);
		
		}
		else {
			this.currentContent = null;
		}
		
		
		var layerHeight = $(this.ctnElement).offsetHeight;
		var documentHeight = document.documentElement.clientHeight;
		
		if (layerHeight > documentHeight){
			var newHeight = documentHeight - 100;
			$(this.ctnElement).setStyles({
				'height': newHeight,
				'margin-top': 0,
				'overflow' : 'auto',
				'overflow-y' : 'auto',
				'top' : 50
			})
		}
		
		
		
		var _self = this;
		// ouverture du fog
		var myFx = new Fx.Style(this.elm, 'opacity', {
			onStart: function (){
				
				this.elm.removeClass("hidden");
				
			}.bind(this),
			onComplete: function (){
				this.fireEvent("onCompleteOpen", this.elm, $(this.options.setTo));
				this.isOpen = true;
				//this.createIfr();
			}.bind(this),
			duration: this.options.duration
		});
		myFx.start(0, this.options.styles.opacity);
		
	},
	
	close: function (){
		this.wait(false);
		if(this.options.noAnimation) {
			this.fireEvent("onCompleteClose", this.elm, $(this.options.setTo));
			return;
		}
		
		// fermeture du fog
		var myFx = new Fx.Style(this.elm, 'opacity', {
			onStart: function (){
				this.fireEvent("onStartClose", this.elm, $(this.options.setTo));
			}.bind(this),
			onComplete: function (){
				this.fireEvent("onCompleteClose", this.elm, $(this.options.setTo));
			}.bind(this),
			duration: this.options.duration + 10
		});
		
		myFx.start(this.options.styles.opacity, 0);
		
		if(this.ctnElement){
			var myFx2 = new Fx.Style($(this.ctnElement), 'opacity', {
				onStart: function (){}.bind(this),
				onComplete: function (){
				}.bind(this),
				duration: this.options.duration
			});
			//myFx2.set(this.options.styles.opacity);
			myFx2.start(this.options.styles.opacity, 0);
			this.fixTopPosition();
		}
	},
	
	setToElm: function (){
		
		if(this.options.setTo && $(this.options.setTo)){
			var coo = $(this.options.setTo).getCoordinates();

			this.elm.setStyles({
				"width": coo.width,
				"height": coo.height,
				"top": coo.top,
				"left": coo.left})
		}
		else {
			var w = Math.max(document.body.scrollWidth, document.documentElement.clientWidth);
			var h = Math.max(document.body.scrollHeight, document.documentElement.clientHeight);
			if(!this.options.styles.width || !this.options.styles.width === 0) this.elm.setStyle('width', w)
			if(!this.options.styles.height ||!this.options.styles.height === 0) this.elm.setStyle('height', h)
			if(!this.options.styles.top ||!this.options.styles.top === 0) this.elm.setStyle('top', 0)
			if(!this.options.styles.left ||!this.options.styles.left === 0) this.elm.setStyle('left', 0)
		}
		if(window.ie6){
			this.ifr.setStyles({
				"width": document.body.scrollWidth,
				"height": document.body.scrollHeight,
				"top": 0,
				"left": 0,
				"zIndex": 998,
				"position": "absolute",
				"filter": "mask()",
				"visibility": "visible"
				})
		}
	},
	
	fixTopPosition: function (){
		if(window.ie6){
			var wHeight = document.documentElement.clientHeight;
			this.interval = setInterval(function (oSelf){
				return function (){
						oSelf.currentContent.setStyle("marginTop", document.documentElement.scrollTop + (wHeight / 2) - (oSelf.currentContent.offsetHeight/2))
				}
			}(this), 1);
		}
	},
	
	strToNode: function (str){
		var div = new Element('div', {"html": str});
		return div.getFirst();
	},
	
	wait: function (bool){
		if(bool){
			this.elm.adopt(new Element('div', {'class': 'fogSpinner'}));
		}
		else {
			this.elm.getElements('.fogSpinner').each(function (el){
				el.remove();
			})
		}
		return this;
	},
	
	remoteInit : function(options){
		this.setOptions(options);
		
		switch(true){
			case this.options.ajaxText != null:
				
				new XHR(
				{
					noCache: this.options.ajaxNoCache,
					onSuccess:	
						function (oSelf){
							return function(responseText, responseXML){
								oSelf.setContent(responseText);
							}
						}(this)
				}).send(this.options.ajaxText);
				break;
			case this.options.ajaxJSON != null:
				
				new XHR(
				{
					noCache: this.options.ajaxNoCache,
					onSuccess:	
						function (oSelf){
							return function(responseJSON, responseText){
								oSelf.setContent(responseJSON);
							}
						}(this)
				}).send(this.options.ajaxText);
				break;
			case this.options.content != null:
				if($type(this.options.content) == "element") {
					this.onDom = true;
					this.options.template = null;
				}
				this.setContent(this.options.content);
				break;
			case this.options.iframeSrc != null:
				this.setContent(new Element('iframe', {'src': this.options.iframeSrc}));
				break;
			default:
				if(this.options.loading) this.wait(true);
				this.onDom = true;
				this.open();
		}
	},
  
  positionnate: function(){
    var layerHeight = $(this.ctnElement).offsetHeight;
		var documentHeight = document.documentElement.clientHeight;
		
		if (layerHeight > documentHeight){
			var newHeight = documentHeight - 100;
			$(this.ctnElement).setStyles({
				'height': newHeight,
				'margin-top': 0,
				'overflow' : 'auto',
				'overflow-y' : 'auto',
				'top' : 50
			})
		}
    
    $(this.ctnElement).setStyle("marginLeft", -$(this.ctnElement).offsetWidth/2);
    $(this.ctnElement).setStyle("marginTop", -$(this.ctnElement).offsetHeight/2);
  }
});


Element.implement({
	// renvoie la css reelement appliquee a l'element (useless ?)
	getCSS: function(sCssRule, btoInt) {
		var strValue = "";
		if(document.defaultView && document.defaultView.getComputedStyle) {
			try{
				strValue = document.defaultView.getComputedStyle(this, null).getPropertyValue(sCssRule);
			}
			catch(e) { strValue = ""; }
		}
		else if(this.currentStyle) {
			try{
				sCssRule = sCssRule.replace(/\-(\w)/g, function (strMatch, p1){
					return p1.toUpperCase();
				});
				strValue = this.currentStyle[sCssRule];
			} catch(e) {
				strValue = "";
			}
		}
		return btoInt ? parseInt(strValue) : strValue;
	}});
	
LayerPopIn.implement(new Options);
LayerPopIn.implement(new Events);
