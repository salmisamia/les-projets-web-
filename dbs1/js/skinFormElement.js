var elSelectForDate = new Class({
    options: {
        container: false,
        element : '.js-mySkinnedSelectForDate'
    },
    initialize: function(options){
        this.setOptions(options);
        this.el = this.options.element;     
        this.name_inputHidden = this.el.getAttribute('data-name');
        this.selectsForDate = $(this.el).getElements('span');
        this.selectsForDate.each(function(item){
            new elSelect( {
                container : ""+item.id,
                hiddenInput : true,
                hiddenInputForDate : true
            } );
        }); 
        this.createHiddenInput();   
    },
    createHiddenInput: function(){
        this.inputForDate = new Element('input').setProperties({
            type  : 'hidden',
            id    : this.name_inputHidden,
            name  : this.name_inputHidden               
        }); 
        this.inputForDate.addClass('inputForDate');
        this.el.adopt(this.inputForDate);   
        this.inputForDate.addEvent('change', function() {
            var dateInputArray = this.inputForDate.value.split('/');
            this.selectsForDate.each(function(item, i) {
                var number = parseInt(dateInputArray[i], 10);
                if (isNaN(number)) {
                    number = 0;
                }
                $(item).getElements('option').each(function(option) {
                   option.selected = option.value == number;
                });
                $(item).getElements('select').fireEvent("change");
            });
        }.bind(this));
    }
});
elSelectForDate.implement(new Events);
elSelectForDate.implement(new Options);


/**
* @file elSelect.js
* @downloaded from http://www.cult-f.net/2007/12/14/elselect/
* @author Sergey Korzhov aka elPas0
* @site  http://www.cult-f.net
* @date December 14, 2007
*
*/

var elSelect = new Class({
    options: {
        container: false,
        baseClass : 'selectSkinned'
    },
    source : false,
    selected : false,
    _select : false,
    current : false,
    selectedOption : false,
    dropDown : false,
    optionsContainer : false,
    hiddenInput : false,
    hiddenInputForDate : false,
    name_hiddenInputForDate : '',
    /*
    pass the options,
    create html and inject into container
    */
    initialize: function(options){
        this.setOptions(options);
        this.allOptions = [];
        if ( !this.options.container ) return;

        this.selected = false;
        this.source = $(this.options.container).getElement('select');
        
        this.autoSubmit= false;
        if($(this.options.container).hasClass("autoSubmit")){
            this.autoSubmit= true;
        }

        this.buildFrameWork();

        $(this.source).getElements('option').each( this.addOption, this );
        
        //on cache le select
        $(this.options.container).addClass('hiddenSelect');
        this._select.injectInside($(this.options.container));

        this.bindEvents();
    },

    buildFrameWork : function() {
        this._select = new Element('div').addClass( this.options.baseClass );
        
        this.current = new Element('div').addClass('selected').injectInside($(this._select));
        this.selectedOption = new Element('div').addClass('selectedOption').injectInside($(this.current));
        this.dropDown = new Element('div').addClass('dropDown').injectInside($(this.current));
        new Element('div').addClass('clear').injectInside($(this._select));
        this.optionsContainer = new Element('div').addClass('optionsContainer').injectInside($(this._select));
        var t = new Element('div').addClass('optionsContainerTop').injectInside($(this.optionsContainer));
        var o = new Element('div').injectInside($(t));
        new Element('div').injectInside($(o));
        var a = new Element('div').addClass('optionsContainerBottom').injectInside($(this.optionsContainer));
        var b = new Element('div').injectInside($(a));
        new Element('div').injectInside($(b));
        
        if (this.options.hiddenInput) {
            this.hiddenInput = new Element('input').setProperties({
                type  : 'hidden',
                name  : this.source.getProperty('name')
            });
            this.hiddenInput.injectInside($(this._select));
        }
    },

    bindEvents : function() {
        document.addEvent('click', function(e) {
            var event = new Event(e);
            if (event.target.className == 'selected' || $(event.target).getParent().className == 'selected') {
                return;
            }
            if ( this.optionsContainer.getStyle('display') == 'block'){
                this.onDropDown();
            }
        }.bind(this));

        this.current.addEvent('click', this.onDropDown.bindWithEvent(this));

        $(this.source).addEvent("change", function() {
            if(this.autoSubmit) {
                this.source.form.submit();
            } else {
                var index = this.source.selectedIndex;
                //Fix IE 8, return -1 instead of 0 for selectedIndex
                if (index < 0) {
                    index = 0;
                }
                var newOption = this.source.options[index];
                if (newOption) {
                    this.selectedOption.setText(newOption.text);
                    if ( this.selected ) this.selected.removeClass('selected');
                    var newOption = this.allOptions[index];
                    if (newOption) {                        
                        newOption.addClass('selected');
                        this.selected = this.allOptions[index];
                    }
                }
            }
        }.bind(this));
    },

    //add single option to select
    addOption: function( option ){
        var o = new Element('div').addClass('option').setProperty('value',option.value);
        if ( option.disabled ) {
            o.addClass('disabled');
        } else {
            o.addEvents( {
                'click': this.onOptionClick.bindWithEvent(this),
                'mouseout': this.onOptionMouseout.bindWithEvent(this),
                'mouseover': this.onOptionMouseover.bindWithEvent(this)
            });
        }

        if ( $defined(option.getProperty('class')) && $chk(option.getProperty('class')) ) {
            o.addClass(option.getProperty('class'));
        }


        if ( option.selected ) {
            if ( this.selected) this.selected.removeClass('selected');
            this.selected = o;
            o.addClass('selected');
            this.selectedOption.setText(option.text);
            if (this.options.hiddenInput) {
                this.hiddenInput.setProperty('value',option.value);
            }
        }
        o.setText(option.text);
        o.injectBefore($(this.optionsContainer).getLast());
        this.allOptions.push(o);
    },

    onDropDown : function( e ) {
        if ( this.optionsContainer.getStyle('display') == 'block') {
            this.optionsContainer.setStyle('display','none');
        } else {
            $$('.optionsContainer').setStyle('display','none');
            this.optionsContainer.setStyle('display','block');
            this.selected.addClass('selected');
            //needed to fix min-width in ie6
            var width =  this.optionsContainer.getStyle('width').toInt() > this._select.getStyle('width').toInt() ? this.optionsContainer.getStyle('width') : this._select.getStyle('width')
            this.optionsContainer.setStyle('width', width)
            this.optionsContainer.getFirst().setStyle('width', width)
            this.optionsContainer.getLast().setStyle('width', width)
        }
    },
    
    onOptionClick : function(e) {
        var event = new Event(e)
        var _this = this;
        if ( this.selected != event.target ) {
            this.selected.removeClass('selected')
            event.target.addClass('selected')
            this.selected = event.target
            this.selectedOption.setText(this.selected.getText());
            if (this.options.hiddenInput) {
                this.hiddenInput.setProperty('value',this.selected.getProperty('value'));
            }
            if(this.options.hiddenInputForDate){
                var parentGroup = this.source.getParent().getParent(); 
                _this.fillHiddenInputForDate(parentGroup);
            }
        }
        var naturalIndex = this.allOptions.indexOf(this.selected);
        this.source.selectedIndex = naturalIndex;
        this.source.fireEvent('change');
        this.onDropDown()
    },
    
    onOptionMouseover : function(e){
        var event = new Event(e)
        this.selected.removeClass('selected')
        event.target.addClass('selected')
    },
    
    onOptionMouseout : function(e){
        var event = new Event(e)
        event.target.removeClass('selected')
    },
    
    fillHiddenInputForDate : function(parentGroup){     
        var day = parentGroup.getElement('input[name=day]').getValue();
        var month = $(parentGroup).getElements('input[name=month]').getValue();
        var year = $(parentGroup).getElements('input[name=year]').getValue();
        var newDate = day + "/" + month + "/" + year;
        $(parentGroup).getElements('.inputForDate')[0].value = newDate;
    }
});

elSelect.implement(new Events);
elSelect.implement(new Options);


var elSelect2 = new Class({
    options: {
        container: false,
        baseClass : 'selectSkinned'
    },
    source : false,
    selected : false,
    _select : false,
    current : false,
    selectedOption : false,
    dropDown : false,
    optionsContainer : false,
    hiddenInput : false,
    /*
    pass the options,
    create html and inject into container
    */
    initialize: function(options){
        this.setOptions(options);
        this.allOptions = [];
        if ( !this.options.container ) return;
        
        this.selected = false;
        this.source = $(this.options.container).getElement('select');
        this.autoSubmit= false;
        if($(this.options.container).hasClass("autoSubmit")){
            this.autoSubmit= true;
        }
        //console.log(this.source)
        this.buildFrameWork();

        $(this.source).getElements('option').each( this.addOption, this );
        //on cache le select
        $(this.options.container).addClass('hiddenSelect');
        this._select.injectInside($(this.options.container));
        this.bindEvents();
        setTimeout(function(){
            this.positionnateContainer();
        }.bind(this),100);

    },
    positionnateContainer: function(){
        var selectStyle = $(this._select).getCoordinates();
        
        $(this.optionsContainer).setStyle("top",selectStyle.top+selectStyle.height );
        $(this.optionsContainer).setStyle("left",selectStyle.left );
        $(this.optionsContainer).setStyle("width",selectStyle.width);
        $(this.optionsContainer).setStyle("position","absolute");
    },
    
    buildFrameWork : function() {
        this._select = new Element('div').addClass( this.options.baseClass );
        this.current = new Element('div').addClass('selected').injectInside($(this._select));
        this.selectedOption = new Element('div').addClass('selectedOption').injectInside($(this.current));
        this.dropDown = new Element('div').addClass('dropDown').injectInside($(this.current));
        new Element('div').addClass('clear').injectInside($(this._select));
        
        this.optionsContainer = new Element('div').addClass('optionsContainer').addClass('optionsContainer2').injectInside($(document.body));
    
        $(this._select).optionsContainer =  this.optionsContainer; 
        
        var t = new Element('div').addClass('optionsContainerTop').injectInside($(this.optionsContainer));
        
        var o = new Element('div').injectInside($(t));
        new Element('div').injectInside($(o));
        var a = new Element('div').addClass('optionsContainerBottom').injectInside($(this.optionsContainer));
        var b = new Element('div').injectInside($(a));
        new Element('div').injectInside($(b));
        
        if (this.options.hiddenInput) {
            this.hiddenInput = new Element('input').setProperties({
                type  : 'hidden',
                name  : this.source.getProperty('name')
            });
            this.hiddenInput.injectInside($(this._select));
        }
    },

    bindEvents : function() {
        document.addEvent('click', function() {
            if ( this.optionsContainer.getStyle('display') == 'block')
                this.onDropDown();
        }.bind(this));

        $(this.options.container).addEvent( 'click', function(e) {
            new Event(e).stop();
        } );
        this.current.addEvent('click', this.onDropDown.bindWithEvent(this) );
        
        $(this.source).addEvent("change",function(){
            if(this.autoSubmit){
                this.source.form.submit();
            } else {
                var index = this.source.selectedIndex;
                var newOption = this.source.options[index];
                if (newOption) {
                    this.selectedOption.setText(newOption.text);
                    if ( this.selected ) this.selected.removeClass('selected');
                    this.allOptions[index].addClass('selected');
                    this.selected = this.allOptions[index];
                }
            }
        }.bind(this));
    },

    //add single option to select
    addOption: function( option ){
        var o = new Element('div').addClass('option').setProperty('value',option.value);
        if ( option.disabled ) {
            o.addClass('disabled');
        } else {
            o.addEvents( {
                'click': this.onOptionClick.bindWithEvent(this),
                'mouseout': this.onOptionMouseout.bindWithEvent(this),
                'mouseover': this.onOptionMouseover.bindWithEvent(this)
            });
        }

        if ( $defined(option.getProperty('class')) && $chk(option.getProperty('class')) ) {
            o.addClass(option.getProperty('class'));
        }


        if ( option.selected ) {
            if ( this.selected) this.selected.removeClass('selected');
            this.selected = o;
            o.addClass('selected');
            this.selectedOption.setText(option.text);
            if (this.options.hiddenInput) {
                this.hiddenInput.setProperty('value',option.value);
            }
        }
        o.setText(option.text);
        o.injectBefore($(this.optionsContainer).getLast());
        this.allOptions.push(o);
    },

    onDropDown : function( e ) {

        if ( this.optionsContainer.getStyle('display') == 'block') {
            this.optionsContainer.setStyle('display','none');
        } else {
            this.optionsContainer.setStyle('display','block');
            this.selected.addClass('selected');
            //needed to fix min-width in ie6
            /* var width =  this.optionsContainer.getStyle('width').toInt() > this._select.getStyle('width').toInt() ? this.optionsContainer.getStyle('width') : this._select.getStyle('width')
            this.optionsContainer.setStyle('width', width)
            this.optionsContainer.getFirst().setStyle('width', width)
            this.optionsContainer.getLast().setStyle('width', width) */
        }
    },
    onOptionClick : function(e) {
        var event = new Event(e);
        if ( this.selected != event.target ) {
            this.selected.removeClass('selected');
            event.target.addClass('selected');
            this.selected = event.target;
            this.selectedOption.setText(this.selected.getText());
            if (this.options.hiddenInput) {
                this.hiddenInput.setProperty('value',this.selected.getProperty('value'));
            }
        }
        var naturalIndex = this.allOptions.indexOf(this.selected);
        this.source.selectedIndex = naturalIndex;
        this.source.fireEvent('change');
        this.onDropDown();
    },
    onOptionMouseover : function(e){
        var event = new Event(e);
        this.selected.removeClass('selected');
        event.target.addClass('selected');
    },
    onOptionMouseout : function(e){
        var event = new Event(e);
        event.target.removeClass('selected');
        event.target.removeClass('selected');
    }

});
elSelect2.implement(new Events);
elSelect2.implement(new Options);


/* Skinnage des radio ET checkbox */

/* Nouveau script : ne pas supprimer */

/*var elRadioCheck = new Class({
    options: {
        element : false,
        activeClass : 'skinnedCheckActive',
        baseClassLabel : 'checkedSkinned',
        notClassLabel : 'notCheckedSkinned'
    },
    initialize: function(options){
        this.setOptions(options);
        var _this = this;
        if ( !this.options.element ) return
        var mySkinnedCheckRadio = $(document.body).getElements("."+this.options.element);
        if(mySkinnedCheckRadio.length != 0){
            mySkinnedCheckRadio.each(function(el,i){
                var _self =el;
                el.addClass(_this.options.activeClass);
                //if(el.getAttribute('inputSkinned')) return;
                el.setAttribute('inputSkinned', true);
                _self.myElInput = el.getElement("input");
                _self.myEllabel = el.getElement("label");
                _self.myEllabel.removeClass(""+_this.options.baseClassLabel);
                _self.myEllabel.addClass(""+_this.options.notClassLabel);
                
                if(_self.myElInput.checked == true){
                    _self.myEllabel.addClass(""+_this.options.baseClassLabel);
                }else{
                    _self.myEllabel.addClass(""+_this.options.notClassLabel);
                }           
                    
                _self.myElInput.addEvent('click', function(e){              
                    var myName = this.getProperty("name");
                    var myInputsBlock = $(document.body).getElements("."+_this.options.element);
                    myInputsBlock.each(function(el){            
                    
                        if(el.getElement("input").getProperty("name") == myName){               
                            var label = el.getElement("label");
                            if(label != _self.getElement('label')){ 
                                label.addEvent('click', function(e){                                
                                    e.preventDefault();                             
                                    
                                    var inputLayer = label.getParent().getElement('input');
                                    label.addClass(""+_this.options.notClassLabel);
                                    inputLayer.checked=true;
                                    if(label.hasClass(""+_this.options.baseClassLabel)){
                                        label.removeClass(""+_this.options.baseClassLabel);
                                        label.addClass(""+_this.options.notClassLabel);
                                        inputLayer.checked=false;
                                    }else{
                                        label.addClass(""+_this.options.baseClassLabel);
                                        label.removeClass(""+_this.options.notClassLabel);
                                    }
                                })  
                            }
                        }
                    });
                    
                    if(this.checked == true){
                        _self.myEllabel.addClass(""+_this.options.baseClassLabel);
                        _self.myEllabel.removeClass(""+_this.options.notClassLabel);
                    }else{
                        _self.myEllabel.addClass(""+_this.options.notClassLabel);
                        _self.myEllabel.removeClass(""+_this.options.baseClassLabel);
                    }
                });
                _self.myElInput.addEvent('changed', function(e){
                    this.myEllabel.removeClass(""+_this.options.baseClassLabel);
                    this.myEllabel.addClass(""+_this.options.notClassLabel);
                    
                    if(this.checked == true){
                        this.myEllabel.addClass(""+_this.options.baseClassLabel);
                    }else{
                        this.myEllabel.addClass(""+_this.options.notClassLabel);
                    }
                });
            });
        }
    }
});
elRadioCheck.implement(new Events);
elRadioCheck.implement(new Options);*/


/* old script : ne pas supprimer */

var elRadioCheck = new Class({
    options : {
        element : false,
        activeClass : 'skinnedCheckActive',
        baseClassLabel : 'checkedSkinned',
        notClassLabel : 'notCheckedSkinned'
    },
    initialize : function (options) {
        this.setOptions(options);
        var _this = this;
        if (!this.options.element) return
        var mySkinnedCheckRadio = $(document.body).getElements("." + this.options.element);
        if (mySkinnedCheckRadio.length != 0) {
            mySkinnedCheckRadio.each(function (el) {
                el.addClass("" + _this.options.activeClass);
                var myElInput = el.getElement("input");
                var myEllabel = el.getElement("label");
                myEllabel.removeClass("" + _this.options.baseClassLabel);
                myEllabel.addClass("" + _this.options.notClassLabel);
                if (myElInput.checked == true) {
                    myEllabel.addClass("" + _this.options.baseClassLabel);
                } else {
                    myEllabel.addClass("" + _this.options.notClassLabel);
                }
                function handleInputChange() {
                    var myName = this.getProperty("name");
                    var myInputsBlock = $(document.body).getElements("." + _this.options.element);
                    myInputsBlock.each(function (el) {
                        if (el.getElement("input").getProperty("name") == myName) {
                            if (el.getElement("input").checked == false) {
                                el.getElement("label").removeClass("" + _this.options.baseClassLabel);
                                el.getElement("label").addClass("" + _this.options.notClassLabel);
                            }
                        }
                    });
                    if (this.checked == true) {
                        myEllabel.addClass("" + _this.options.baseClassLabel);
                    } else {
                        myEllabel.addClass("" + _this.options.notClassLabel);
                    }
                }
                function checkUncheckElem() {
                    myEllabel.removeClass("" + _this.options.baseClassLabel);
                    myEllabel.addClass("" + _this.options.notClassLabel);
                    if (this.checked == true) {
                        myEllabel.addClass("" + _this.options.baseClassLabel);
                    } else {
                        myEllabel.addClass("" + _this.options.notClassLabel);
                    }
                }
                myElInput.addEvents({
                    'click' : handleInputChange,
                    'changed' : checkUncheckElem
                });
            });
        }
    }
});
elRadioCheck.implement(new Events);
elRadioCheck.implement(new Options);

var SkinFile = new Class({
    initialize: function (elm, opts){   
        //this.setOptions(opts);
        this.elm = $(elm);
        this.container = this.elm.getParent();
        this.create();
    },
    
    create: function(){
        var input = this.elm;
            var fake_text = new Element('input',{
                'type':'text',
                'class':'fake-text',
                'value': this.elm.getAttribute("title")
            });

        this.elm.setStyles(
            {
                'opacity':0.0001,
                /*width: this.container.offsetWidth,
                height: this.container.offsetHeight,*/
                width: "305px",
                height: "30px",
                position: "relative",
                "z-index": 10000000000
            }
        )
        
        var nextEl = input.getNext();
        if(!nextEl) {
           this.container.adopt(fake_text);
        }
        
        this.elm.addEvents({
            'change':function(e){
                fake_text.set({
                    'value':input.value
                });
                //$('file_upload').submit();
            }           
        })      
    }
});

