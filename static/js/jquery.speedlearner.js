$.widget("sdrdis.speedlearner", {
    options: {
        nbWordsPerLearnBeginner: 5,
        nbSuccessfulTries: 3
    },
    instances: {
        menu: null,
        learningCenter: null,
        learningCenterInput: null,
        learningCenterShowZone: null,
        learningCenterErrorZone: null
    },
    testOnTitle: 0,
    questions: {},
    mode: null,
    scores: [],
    currentQuestion: 0,
    availableQuestions: {},
    nbAvailableQuestions: 0,
    errorStep: 0,
    globalCounter: 0,
    firstTime: [],

    __: function(text) {
        return text;
    },

    _create: function() {
        var self = this;
        this.refreshMenu();
        this.refreshLearningCenter();
        this.selectMenu();
    },

    refreshMenu: function() {
        var self = this;
        this.instances.menu = $('<div class="menu"></div>');
        this.instances.menu.appendTo(this.element);

        var $testOn = $('<div class="test_on"></div>');
        $testOn.appendTo(this.instances.menu);
        var $testOnTitle = $('<div class="test_on_title"></div>').text(this.__('Test on:'));
        $testOnTitle.appendTo($testOn);
        for (var i = 0; i < 2; i++) {
            var $testOnItem = $('<div class="test_on_item">');
            $testOnItem.appendTo($testOn);
            var $testOnRadio = $('<input type="radio" name="test_on" />').attr('id', 'test_on_' + i).data('id', i).click(function() {
                self.selectTestOnTitle($(this).data('id'));
            });
            if (i == 0) {
                $testOnRadio.attr('checked', 'checked');
            }
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
    },

    refreshLearningCenter: function() {
        var self = this;
        this.instances.learningCenter = $('<div class="learning_center"></div>');
        this.instances.learningCenter.appendTo(this.element);

        this.instances.learningCenterCompletion = $('<div class="completion"></div>');
        this.instances.learningCenterCompletion.appendTo(this.instances.learningCenter);

        this.instances.learningCenterShowZone = $('<div class="show_zone"></div>');
        this.instances.learningCenterShowZone.appendTo(this.instances.learningCenter);

        this.instances.learningCenterErrorZone = $('<div class="error_zone"></div>');
        this.instances.learningCenterErrorZone.appendTo(this.instances.learningCenter);

        var $formZone = $('<form></form>');
        $formZone.submit(function(e) {
            e.preventDefault();
            self.validate();
        });
        $formZone.appendTo(this.instances.learningCenter);

        this.instances.learningCenterInput = $('<input type="text" />');
        this.instances.learningCenterInput.appendTo($formZone);

        var $submit = $('<input type="submit" />').val(this.__('Validate'));
        $submit.appendTo($formZone);

    },

    validate: function() {
        var isCorrect = this.instances.learningCenterInput.val() == this.questions[this.currentQuestion].answer;
        this.instances.learningCenterInput.val('');
        if (isCorrect) {
            if (this.errorStep == 1) {
                this.instances.learningCenterErrorZone.text('');
                this.errorStep = 2;
                return;
            }
            var deleteQuestion = false;
            if (this.errorStep == 0) {
                if (this.mode == 'test') {
                    deleteQuestion = true;
                } else {
                    if (this.scores[this.currentQuestion] >= this.options.nbSuccessfulTries) {
                        deleteQuestion = true;
                    } else {
                        this.scores[this.currentQuestion]++;
                    }
                }
            }
            this.errorStep = 0;

            this.next(deleteQuestion);
        } else {
            this.instances.learningCenterErrorZone.text(this.questions[this.currentQuestion].answer);
            this.scores[this.currentQuestion] = 0;
            this.firstTime[this.currentQuestion] = false;
            this.errorStep = 1;
        }

    },

    next: function(deleteQuestion) {
        if (deleteQuestion) {
            delete this.availableQuestions[this.currentQuestion];
            this.nbAvailableQuestions--;
            this.globalCounter++;
        }

        this.instances.learningCenterCompletion.text(this.globalCounter + ' / ' + this.questions.length)

        if (this.nbAvailableQuestions == 0) {
            if (this.mode == 'test' || this.mode == 'learn_advanced') {
                this.endLearning();
                return;
            } else {
                var nextStep = Math.floor(this.currentQuestion / this.options.nbWordsPerLearnBeginner) + 1;
                if (typeof this.questions[nextStep * this.options.nbWordsPerLearnBeginner] === 'undefined') {
                    this.endLearning();
                    return;
                }
                for (var i = nextStep * this.options.nbWordsPerLearnBeginner; i < Math.min((nextStep + 1) * this.options.nbWordsPerLearnBeginner, this.questions.length); i++) {
                    this.nbAvailableQuestions++;
                    this.availableQuestions[i] = true;
                }
            }
        }

        do {
            this.currentQuestion = Math.floor(Math.random() * this.questions.length);
        } while(typeof this.availableQuestions[this.currentQuestion] === 'undefined');

        this.instances.learningCenterInput.val('');
        this.instances.learningCenterShowZone.text(this.questions[this.currentQuestion].question);
    },

    endLearning: function() {
        var nbFirstCorrect = 0;
        for (var i = 0; i < this.questions.length; i++) {
            nbFirstCorrect += this.firstTime[i] ? 1 : 0;
        }
        alert('Score: ' + nbFirstCorrect + ' / ' + this.questions.length + ' (' + Math.round(nbFirstCorrect * 100 / this.questions.length) + '%)');
        this.selectMenu();
    },

    selectMenu: function() {
        this.element.addClass('on_menu').removeClass('on_learning_center');
    },

    selectLearningCenter: function() {
        this.element.addClass('on_learning_center').removeClass('on_menu');
        this.scores = [];
        this.questions = [];
        this.availableQuestions = {};
        this.firstTime = [];
        this.nbAvailableQuestions = 0;
        for (var i = 0; i < this.options.data.length; i++) {
            this.questions.push({
                question: this.options.data[i][this.options.titles[1 - this.testOnTitle]],
                answer: this.options.data[i][this.options.titles[this.testOnTitle]]
            });
            this.scores.push(0);
            this.firstTime.push(true);
            if (this.mode != 'learn_beginner' || i < this.options.nbWordsPerLearnBeginner) {
                this.nbAvailableQuestions++;
                this.availableQuestions[i] = true;
            }
        }
        this.currentQuestion = 0;
        this.next(false);
    },

    selectLearnBeginner: function() {
        this.mode = 'learn_beginner';
        this.selectLearningCenter();
    },

    selectLearnAdvanced: function() {
        this.mode = 'learn_advanced';
        this.selectLearningCenter();
    },

    selectTest: function() {
        this.mode = 'test';
        this.selectLearningCenter();
    },

    selectTestOnTitle: function(id) {
        this.testOnTitle = id;
    }

});