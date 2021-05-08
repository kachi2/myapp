/**
 * @constructor
 */
const HomeView = function() {
    this.projectsLoaded = true;
    this.roadmapLoaded = true;
    this.economicsLoaded = true;
    this.distributionLoaded = true;
};

/**
 * initiating intro animation
 * scroll 1px up to trigger animation
 */
HomeView.prototype.init = function() {
    const self = this;
    
    if (initScriptsView.resType == 'desktop') {
        self.scrollTriggers();
    }
};

/**
 * handles scrolling triggers and executes animation
 */
HomeView.prototype.scrollTriggers = function() {
    const self = this;
    const exchange = document.getElementsByClassName('exchange')[0];
    const mining = document.getElementsByClassName('mining')[0];
    const blockchain = document.getElementsByClassName('blockchain')[0];
    const chat = document.getElementById('tawkchat-container');
    
    var lastScrollTop = 0;
    var step = 0;
    
    window.addEventListener('scroll', function() {
      
        setTimeout(function() {
            if (chat != undefined) {
                chat.style.transform = 'none';
            }
        }, 1000);
          
        if (!self.projectsLoaded) {
            self.projectTrigger(exchange);
            self.projectTrigger(mining);
            self.projectTrigger(blockchain);
        }
        
        if (!self.roadmapLoaded) {
            self.roadmapTrigger();
        }
        
        if (!self.economicsLoaded) {
            self.economicsTrigger();
        }
        
        if (!self.distributionLoaded) {
            self.distributionTrigger();
        }
        
        /*
        var wh = $(window).height();
        var r = $('#roadmap_text');
        var t = $('#tokens_text');
        var rh = r.outerHeight();
        var th = t.outerHeight();
        var rOffset = r.offset().top;
        var tOffset = t.offset().top;
        var st = $(this).scrollTop();
        var path = st + wh;
        var rDelta = path - rOffset - rh;
        var tDelta = path - tOffset - th;
        
        if (path >= rOffset && path <= rOffset + 500) {
            r.css({
                'transform': 'translateY(' + rDelta + 'px)',
                '-webkit-transform': 'translateY(' + rDelta + 'px)'
            });
        }
        
        if (path >= tOffset && path <= tOffset + 1300) {
            t.css({
                'transform': 'translateY(' + tDelta + 'px)',
                '-webkit-transform': 'translateY(' + tDelta + 'px)'
            });
        }*/
    });
};

/**
 * triggers Projects section animation once scrolled to it
 * FUTURE NOTE: replace CSS with class assignment instead
 * @param {elem} (exchange / mining / blockchain)
 */
HomeView.prototype.projectTrigger = function(elem) {
    const self = this;
    const wrap = document.getElementById('projects');
    const trigger = elem.getElementsByClassName('trigger')[0];
    const text = elem.getElementsByClassName('project_text')[0];
    //const circle = elem.getElementsByTagName('circle')[0];
        
    if (trigger.getBoundingClientRect().top < window.innerHeight) {
        elem.classList.add('project-loaded');
        if (elem.classList.contains('blockchain')) {
            self.projectsLoaded = true;
            wrap.classList.add('loaded');
        }
    }
};

/**
 * triggers Roadmap section animation once scrolled to it
 * FUTURE NOTE: replace CSS with class assignment instead
 */
HomeView.prototype.roadmapTrigger = function() {
    const self = this;
    
    const wrap = document.getElementById('roadmap');
    const trigger = wrap.getElementsByClassName('trigger')[0];
    const lines = document.getElementsByClassName('step_line');
        
    
    if (trigger.getBoundingClientRect().top < window.innerHeight) {
        self.roadmapLoaded = true;
        wrap.classList.add('loaded');
        
        // pre-assigning i parameter
        for (var i = 0; i < 7; i++) { // 4 lines, change manually
          doSetTimeout(i);
        }
        
        function doSetTimeout(i) {
            setTimeout(function() {
                lines[i].style.filter = 'invert(1) brightness(4)';
            }, i * 320); // 0, 700, 1400, 2100 (2100 is logo and path transition time);
        };
    }
};

/**
 * triggers Economics section animation once scrolled to it
 * FUTURE NOTE: replace CSS with class assignment instead
 */
HomeView.prototype.economicsTrigger = function() {
    const self = this;
    const wrap = document.getElementById('token-economics');
    const trigger = wrap.getElementsByClassName('trigger')[0];
    const dot = document.getElementsByClassName('token-dot');
    
    if (trigger.getBoundingClientRect().top < window.innerHeight) {
        self.economicsLoaded = true;
        wrap.classList.add('loaded');
        /*for (var i = 0; i < dot.length; i++) {
            dot[i].style.animation = 'tokens 1s ease-in-out forwards';
        }*/
    }
};

/**
 * triggers Economics section animation once scrolled to it
 * FUTURE NOTE: replace CSS with class assignment instead
 */
HomeView.prototype.distributionTrigger = function() {
    const self = this;
    const wrap = document.getElementById('distribution');
    const trigger = wrap.getElementsByClassName('trigger')[0];
    
    if (trigger.getBoundingClientRect().top < window.innerHeight) {
        self.distributionLoaded = true;
        wrap.classList.add('loaded');
    }
    
    // chart count
    /*
    function chartNum() {
      $('.count1').each(function () {
          $(this).prop('Counter',0).animate({
              Counter: $(this).text()
          }, {
              duration: 2500,
              easing: 'swing',
              step: function (now) {
                  $(this).text(Math.ceil(now));
              }
          });
      });
      $('.count1').removeClass('count1');
    }*/
};