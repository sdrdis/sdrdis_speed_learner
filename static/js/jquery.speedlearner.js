$.widget("sdrdis.speedlearner", {
    options: {
    },
    instances: {
        menu: null
    },

    __: function(text) {
        return text;
    },

    _create: function() {
        var self = this;
        console.log(this.options);
        this.refreshMenu();
    },

    refreshMenu: function() {
        var self = this;
        this.instances.menu = $('<div class="menu"></div>');

        var $testOn = $('<div class="test_on"></div>');
        $testOn.appendTo(this.instances.menu);
        var $testOnTitle = $('<div class="test_on_title"></div>').text(this.__('Test on:'));
        $testOnTitle.appendTo($testOn);
        for (var i = 0; i < 2; i++) {
            var $testOnItem = $('<div class="test_on_item">');
            $testOnItem.appendTo($testOn);
            var $testOnRadio = $('<input type="radio" name="test_on" />').attr('id', 'test_on_' + i);
            $testOnRadio.appendTo($testOnItem);
            var $testOnLabel = $('<label></label>').text(this.options.titles[i]).attr('for', 'test_on_' + i);
            $testOnLabel.appendTo($testOnItem);
        }

        var $choices = $('<div class="choices"></div>');
        $choices.appendTo(this.instances.menu);
        var $learnBeginner = $('<button class="learn_beginner choice"></button>').text(this.__('Learn for beginners')).click(function() {
            self.selectLearnBeginner();
        });
        $learnBeginner.appendTo($choices);
        var $learnAdvanced = $('<button class="learn_advanced choice"></button>').text(this.__('Learn for advanced')).click(function() {
            self.selectLearnAdvanced();
        });
        $learnAdvanced.appendTo($choices);
        var $test = $('<button class="test choice"></button>').text(this.__('Test')).click(function() {
            self.selectTest();
        });
        $test.appendTo($choices);

        this.instances.menu.appendTo(this.element);
    },

    selectLearnBeginner: function() {
    },

    selectLearnAdvanced: function() {

    },

    selectTest: function() {

    }

});