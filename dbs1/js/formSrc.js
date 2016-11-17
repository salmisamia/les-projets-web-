var browserIsIE = false;
if(navigator.appName == "Microsoft Internet Explorer"){
    browserIsIE = true;
}


$(window).addEvent(
    // executes a function when the dom tree is loaded, without waiting for images. 
    'domready', function () {
        chooseForm();
        setCheckActivate();
        mySkinnedFormElements();
        areaMax();
        uploadFiles();
        popup = new PopIn();
        addFF2Class();
        new kmActuel();
    }
);


var setCheckActivate = function(){
    var mycheckActivates = $(window.document).getElements(".checkActivate");
    if(mycheckActivates.length != 0){
        mycheckActivates.each(function(elem, index){
            var myElem = $(elem);
            var mySource = myElem.getElement(".checkSource");
            var myTargets = myElem.getElements(".ckeckTarget");
            
            var mytargetValidation = "";
            
            myTargets.setProperty("disabled","disabled");
            if(browserIsIE) myTargets.set('disabled', true);            
            if(browserIsIE) myTargets.addClass('Nvalid');
            $(mySource).addEvent("click", function(){
                if(this.checked){
                    myTargets.removeProperty("disabled");
                    if(browserIsIE) myTargets.set('disabled', false);
                    if(browserIsIE) myTargets.removeClass('Nvalid');
                    for(var i=0; i<myTargets.length; i++){
                        mytargetValidation = ""+myTargets[i].getProperty("validation");
                        if(mytargetValidation.contains('required', ' ')){
                        
                        }else{
                            mytargetValidation = " required "+mytargetValidation;
                            myTargets[i].setProperty("validation",""+mytargetValidation);
                        }
                    }
                    
                }else{
                    for(var i=0; i<myTargets.length; i++){
                        mytargetValidation = ""+myTargets[i].getProperty("validation");
                        myTargets[i].value="";
                        if(mytargetValidation.contains('required', ' ')){
                            mytargetValidation = mytargetValidation.replace(" required ","");
                            //console.log(mytargetValidation)
                            myTargets[i].setProperty("validation",""+mytargetValidation);
                        }
                    }
                    myTargets.setProperty("disabled","disabled");
                    if(browserIsIE) myTargets.set('disabled', true);
                    if(browserIsIE) myTargets.addClass('Nvalid');
                }
            })
            
        });
    }
}

var chooseForm = function(){

        //call the selected element
        var element = $('choiceSelect');
            
        //associate option with content
        var choice1 = ['leftChoice1', 'rightChoice1'];
        var choice2 = ['leftChoice2', 'rightChoice2'];
        var choiceAll = ['leftChoice1', 'rightChoice1', 'leftChoice2', 'rightChoice2'];
        var btnVal = $('btnVal');
        
        //hide / show content
        element.addEvent('change', function(){
            var index = element.selectedIndex;
            var el = this;
            var option = element.options[index];
            var choice = option.value == 'information' ? choice1 : choice2;
            if (option.value == 'choice0'){
                btnVal.addClass('hidden');
                choiceAll.each(function(sId){
                    $(sId).addClass('hidden');
                })
            }else{
                btnVal.removeClass('hidden');
                choiceAll.each(function(sId){
                    $(sId).addClass('hidden');
                })
                choice.each(function(sId){
                    $(sId).removeClass('hidden');
                })
            }
        })
        element.fireEvent('change');
}


function mySkinnedFormElements() {
    //Selects skinned 
    var mySkinnedSelect = $(document.body).getElements(".skinnedSelect");
    if(mySkinnedSelect.length != 0){
        mySkinnedSelect.each(function(el){
            new elSelect( {container : el} );
        });
    }
    //Checkbox skinned 
    var mySkinnedCheck = new elRadioCheck({element : 'skinnedCheck', activeClass : 'skinnedCheckActive'});
//    var mySkinnedCheck = new elRadioCheckMessage({element : 'skinnedCheck', activeClass : 'skinnedCheckActive'});
    //Radio skinned
    var mySkinnedCheck = new elRadioCheck({element : 'skinnedRadio', activeClass : 'skinnedRadioActive'});
    
}
var areaMax = function(){
    //recup des inputs
    $$('.textareaMaxed').each(function(area){
        var max = area.getAttribute('max');
        area.addEvent('keyup', function(e){
            if (area.value.length > max){
                area.value = area.value.slice(0, max);
            }
        })
    })
}


function uploadFiles(){
    
    var ctn =  $('inputContainer');
    var firstInput = ctn.getElement('input');
    var max = firstInput.getAttribute('max') ? firstInput.getAttribute('max') : 10;
    /*console.info(max);*/
    var index = 0; /* compte le nombre de fichiers ajoutÃ©s*/
    var newInput = new Element('input',{'type':'file','name':'uploads['+parseInt(index+1)+']','id':'uploads'+index});
    var newUl = new Element('ul');
    var msgError = new Element('div',{'class':'errormsg hidden tMargin'}).setHTML('Le nombre de pi&egrave;ces jointes est limit\u00E9 &agrave; 10. Le poids total (message + pi&egrave;ces jointes) ne peut exc\u00E9der 3 Mo.');
    ctn.adopt(newUl);
    ctn.adopt(msgError);
    var newLi = new Element('li',{'class':'newFile line'});
    var newSpan = new Element('span',{'title':'supprimer'});
    var msgErrorSizeFile = new Element('div',{'class':'errormsg hidden tMargin'}).setHTML('Le poids total des pi&egrave;ces jointes ne peut exc\u00E9der 3 Mo');
    ctn.adopt(newUl);
    ctn.adopt(msgErrorSizeFile);
    
    var create = function (el){
        
        el.addEvent('change', function(){
            var val = el.value;
            var clone = newLi.clone();
            var close = newSpan.clone();
            //var close = newSpan.clone().setHTML('close');
            var input = newInput.clone();
            //console.log(index);
                            
            close.addEvent('click', function(){
                clone.remove();
                el.remove();    
                if(index==max){
                    ctn.adopt(input);
                    create(input);
                    msgError.addClass('hidden');
                }
                index --;
                newInput.setAttribute('name','uploads['+parseInt(index+1)+']');
                newInput.setAttribute('id','uploads'+index);
            });         

            close.addClass('supprimer');
            clone.innerHTML = val;
            clone.adopt(close);
            newUl.adopt(clone);
            el.addClass('hidden');
            index ++;
            newInput.setAttribute('name','uploads['+parseInt(index+1)+']');
            newInput.setAttribute('id','uploads'+index);
            if (index==max){
                msgError.removeClass('hidden');
                return;
            }
            ctn.adopt(input);
            create(input);
        });
    }
    create(firstInput);
}

var PopIn = new Class({
    options : {
        width : 370
    },
    initialize : function(options){
        
        this.setOptions(options);
        this.page = $E('body');
        this.layer = $('layer');
        
        this.createElms();
        
        //gestion echap kbd
        this.escapeLayer();
        
        
        //gestion Envoyer a un ami
        //this.sendTo();
        
        //check url pour ouvrir le layer eventuellement parametre
        this.doUrl();
    },
    doUrl : function(){
        var qString = document.location.search;
        var toUse = qString.substr(1,qString.length);
        var duos = toUse.split('&');
        var number = 0;
        var param = false;
        var sendToAlreadyOpened = false;
        
        duos.each(function(duo){
            var array = duo.split('=');
            if (array[0]=='id'){
                param = true;
                identifiant = array[1];
            }
            if (array[0]=='sendToOpen'){
                sendToAlreadyOpened = array[1];
            }
        });
        //ouverture layer identifie dans url
        var identifiant = $(identifiant);
        if (!identifiant) return;
        this.show(identifiant, sendToAlreadyOpened);
    },
    createElms : function(){
        //on met le layer dans body
        this.page.adopt(this.layer);
        
        this.mask = new Element('div',{'class':'popMask'}).setOpacity(0);
        this.page.adopt(this.mask);
        if(IS_IE){
            this.mask.iframe = new Element('iframe')
            this.mask.iframe.src = 'javascript:void(0)';
            this.mask.adopt(this.mask.iframe);
        }
    },
    setMaskDimensions : function(){
        var coord = {};
        coord.width = window.getScrollWidth();
        coord.height = window.getScrollHeight();
        this.mask.setStyles(coord);
        if (IS_IE){
            this.mask.iframe.setStyles(coord)
        };
    },
    updateLayerPosition : function(options){
        this.posX = window.getScrollLeft()+window.getWidth()/2 - this.options.width/2;
        this.posY = window.getScrollTop()+window.getHeight()/2 - this.layer.getSize().size.y/2;
        this.layer.setStyles({'left':this.posX,'top':this.posY,'width':this.options.width});
        //this.layer.effect('top',{duration:100}).start(this.posY);
        //this.layer.setStyles({'left':this.posX,'width':this.options.width});
    },
    show : function(ref, bool) {
        //this.populate(ref);
        this.updateLayerPosition();
        this.setMaskDimensions();
        if (bool == 'true') this.switchSendTo();
        this.layer.effect('opacity').start(1);
        this.mask.effect('opacity').start(0.7);
        //check scroll position to update popin position
        //init transition
        //if(!window.ie6)
            this.fxLayerFollowing = new Fx.Style(this.layer, 'top', {duration:400,wait:false});
        window.addEvent('scroll',function(e){
            //if(!window.ie6)
                this.fxLayerFollowing.start(window.getScrollTop()+window.getHeight()/2 - this.layer.getSize().size.y/2);
        }.bind(this))
        
    },
    escapeLayer : function(){
        document.addEvent('keydown', function(e){
            if (e.keyCode.toInt() == 27) this.hide();
        }.bind(this))
    },
    hide : function() {
        
        this.mask.effect('opacity',{duration:200,
            onStart : function(){
                //if (this.switchSendTo.open == true) this.switchSendTo();
            }.bind(this),
            onComplete : function(){
                this.layer.effect('opacity').start(0);
                //this.unPopulate();
            }.bind(this)
        }).start(0);
    }
});
PopIn.implement(new Options)

var TipsMerch = new Class({
    initialize : function(){
        this.tds = $$('.tipIt');
        this.bloc = $('panier');
        
        this.tds.each(function(td){
            td.addEvent('mouseenter',function(){
                this.show(td);
            }.bind(this))
            td.addEvent('mouseleave',function(){
                this.hide(td);
            }.bind(this))
        }.bind(this))
        
        this.div = new Element('div').injectInside($('page'))
        .addClass('clonedTipBoxLayer')
        .setStyles({
            opacity:0,
            display:'block'
        });
        
        ifrlayer.make(this.div);
        
        this.opac = new Fx.Styles(this.div, {duration: 100, transition: Fx.Transitions.linear});
        this.opac2 = new Fx.Styles(this.div, {duration: 100, transition: Fx.Transitions.linear, onComplete:function(e){
            ifrlayer.hide(e);
        }});
    },
    show : function(td){
        this.div.empty();
        this.doClone(td);
        this.posIt(td);
        this.clone.setStyle('display','block');
        ifrlayer.make(this.div);
        this.opac.start({
            'opacity': 1
        });
        $clear(this.time);
    },
    hide : function(td){
        this.time = (function(){
            this.opac2.start({
                'opacity': 0
            });
        }).delay(500,this)
    },
    posIt : function(td){
        if (this.div.getCoordinates().bottom >= document.documentElement.clientHeight){
            this.div.setStyle('top', td.getCoordinates().bottom - this.div.offsetHeight)
        }
        if((td.getCoordinates().right - this.bloc.getLeft()) + this.div.offsetWidth > this.bloc.offsetWidth){
            this.div.setStyle('left', td.getLeft() - $('page').getLeft() - this.div.offsetWidth)
        }else{
            this.div.setStyle('left', td.getCoordinates().right - $('page').getLeft())
        }
    },
    doClone : function(td){
        this.layer = td.getElement('.tipBoxLayer');
        this.clone = this.layer.clone();
        this.clone.injectInside(this.div);
        this.div.setStyle('top', td.getTop());
    },
    delClone :function(){
        this.clone.remove();
    }
    
})


var BrandCriterias = new Class({
    initialize : function(){
        this.criterias = $('refineBrand').getElements('ul li input');
        //on ne prends pas en compte le dernier qui est le all
        this.criterias.pop();
    },
    selectAll : function(elm){
        if (elm.checked){
            //si checkÃ© unset allet uncheck elm
            this.setAllStatus();
        }else{
            //si non chÃ©ckÃ© set all et check elm
            this.unsetAllStatus();
        }
    },
    setAllStatus : function(){
        //itere chaque elements
        this.criterias.each(function(criteria){
            //enregistre etat before sur chaque elms
            criteria.checkedStatus = criteria.checked;
            //on les sÃ©lectionne tous
            criteria.checked = true;
            criteria.disabled = true;
            //on les mets en gris
            criteria.getParent().addClass('disabled');
        })
    },
    unsetAllStatus : function(){
        //itere chaque elements
        this.criterias.each(function(criteria){
            //recover etat before sur chaque elms
            criteria.checked = criteria.checkedStatus;
            criteria.disabled = false;
            //reprise de la couleur initiale les en normal
            criteria.getParent().removeClass('disabled');
        })
        
    }
})


function addFF2Class(){
    if(window.navigator.userAgent.match('Firefox/2'))
        $('page').addClass('IS_FF2');
    
}


var kmActuel = new Class({
    initialize : function(){
        //get input
        var oInput = $('km');
        oInput.addEvent('blur', function(){
            //get input value
            var _s = oInput.value;
            //erace spaces
            _s = _s.replace(/ /gi, '');
            if (_s.length < 4) return;
            //value on an array
            _a = _s.split('').reverse();
            var _aTemp = [];
            for (var i = 0 ; i < _a.length; i++){
                //every 3 numbers push an space
                if (i%3 == 0){
                    _aTemp.push(' ');
                }
                _aTemp.push(_a[i]);
                
            }
            var _arr = _aTemp.reverse();
            //erase last space
            _arr.pop();
            oInput.value = _arr.join('');
        
        })
        oInput.addEvent('focus', function(){
            //replace value
            var _s = oInput.value;
            _s = _s.replace(/ /gi, '');
            oInput.value = _s;
        })
    }
    
})
