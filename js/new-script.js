/*!
 * Plugin:      Fabelio Trade In Builder
 * Author:      Yulius Adrianto
 * Version:     1.0
 */
jQuery(document).ready(function($){
    function TradeInBuilder( element ) {
        this.element = element;

        this.tradeInStepsWrapper = this.element.find('.tradein-steps-wrapper');
        this.tradeInSteps = this.element.find('.tradein-step');

        this.inputImages = this.element.find('#inputImages');
        this.inputColor = this.element.find('#inputColor');

        // Navigation
        this.tradeinMainNav = this.element.find('.tradein-main-nav');
        this.tradeinFooter = this.element.find('.tradein-footer');
        this.tradeinFooterNav = this.element.find('.tradein-secondary-nav');

        this.optionsCats = this.element.find('.options-cat');
        this.optionsProducts = null;

        //builder navigations
        this.mainNavigation = this.element.find('.cd-builder-main-nav');
        //used to check if the builder content has been loaded properly
        this.loaded = true;

        // bind builder events
        this.bindEvents();
    }

    TradeInBuilder.prototype.bindEvents = function() {
        var self = this;

        // Category Options
        this.optionsCats.on('click','.js-option', function (ev) {
			ev.preventDefault();
			self.updateSelectedCat($(this));
        });

        // Main Navigation Clicked
        this.tradeinMainNav.on('click','li:not(.active)', function (ev) {
            ev.preventDefault();
            self.loaded && self.newSectionSelected($(this).index());
        });

        // Footer Navigation Clicked
        this.tradeinFooterNav.on('click', '.nav-item:not(.proceed)', function (ev) {
            ev.preventDefault();
            var currentSection = self.tradeinMainNav.find('.active').index(),
                $index = ($(this).hasClass('next')) ? currentSection+1 : currentSection-1;

            if (currentSection == self.tradeInSteps.length -1 && $(this).is('.next')) {
                return;
            } else {
                self.loaded && self.newSectionSelected($index);
            }
        });

        this.inputImages.fileinput({
            uploadUrl: 'http://localhost/file-upload-single/1',
            theme: 'fa',
            showCaption: false,
            maxFileCount: 5,
            maxFileSize: 1000,
            allowedFileTypes: ['image'],
            //maxFilePreviewSize: 10240
        });

        this.inputColor.spectrum({
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            hideAfterPaletteSelect: true,
            color: 'blanchedalmond',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });

    }

    TradeInBuilder.prototype.newSectionSelected = function(nextSection,link) {
        var currentSection = this.tradeInSteps.filter('.active');

        if(currentSection.is('.required')) {
            var options = currentSection.find('.options-list'),
                selectedOption = options.find('li').filter('.selected');

            if(selectedOption.length > 0) {
                $('html,body').stop().animate({scrollTop: $('.tradein-wrapper').offset().top},200);

                this.tradeInStepsWrapper.addClass('isLoading');
                this.showNewSection(nextSection);
                this.updatePrimaryNav(nextSection);
                this.updateSecondaryNav(nextSection);
            } else {
                this.tradeinFooter.addClass('show-alert');
            }
        } else {
            if(this.tradeinFooter.hasClass('disabled')) {
                this.tradeinFooter.addClass('show-alert');
            } else {
                $('html,body').stop().animate({scrollTop: $('.tradein-wrapper').offset().top},200);

                this.tradeInStepsWrapper.addClass('isLoading');
                this.showNewSection(nextSection);
                this.updatePrimaryNav(nextSection);
                this.updateSecondaryNav(nextSection);
            }
        }
    }

    if( $('.tradein-builder').length > 0 ) {
        $('.tradein-builder').each(function(){
            //create a TradeInBuilder object for each .tradein-builder
            new TradeInBuilder($(this));
        });
    }
});
