/**
 * @constructor
 */
const InitScriptsView = function() {
    this.menuOpen = false;
    
    /*
    if (window.location.href.includes('zzz.com.ua')) {
        this.hostingAdBlock();
        console.log('ads blocked');
    }*/
    
    this.resType = null;
    this.checkMedia();
};

/**
 * initiating intro animation
 * scroll 1px up to trigger animation
 */
InitScriptsView.prototype.init = function() {
    const self = this;

    document.body.classList.remove('init');
    
    window.scrollTo({
        top: window.scrollY - 1
    });
    
    self.navigation();
    self.burgerMenu();
    
    window.addEventListener('resize', function() {
        self.checkMedia();
    });
};

/**
 * controls navigation
 */
InitScriptsView.prototype.navigation = function() {
    const self = this;

    
    const projects = document.getElementsByClassName('project');
    const roadmap = document.getElementsByClassName('roadmap');
    const token = document.getElementsByClassName('token');
    const team = document.getElementsByClassName('team');
    
    const projectsBlock = document.getElementById('projects');
    const roadmapBlock = document.getElementById('roadmap');
    const tokenBlock = document.getElementById('token-economics');
    const teamBlock = document.getElementById('team');
    
    const items = [[projects, projectsBlock],
                   [roadmap, roadmapBlock], 
                   [token, tokenBlock], 
                   [team, teamBlock]];
    
    
    for (var i = 0; i < items.length; i++) { // 4
        var item = items[i][0];
        var block = items[i][1];
        for (var j = 0; j < item.length; j++) { // 2
            item[j].onclick = (function(i) {
                return function() {
                    items[i][1].scrollIntoView({
                        behavior: 'smooth'
                    });
                    return false; // disabling link
                }
            })(i);
        }
    }
};

/**
 * controls mobile menu
 */
InitScriptsView.prototype.burgerMenu = function() {
    const self = this,
          button = document.getElementsByClassName('burger-menu')[0],
          nav = document.getElementsByClassName('nav')[0],
          links = nav.getElementsByTagName('li');
          
    button.onclick = function burgerMenu() {
        if (!self.menuOpen) {
            self.menuOpen = true;
            document.documentElement.classList.add('open-menu');
            for (var i = 0; i < links.length; i++) {
                links[i].onmouseup = (function(i) {
                    return function() {
                        burgerMenu();
                    }
                })(i);
            }
        } else {
            self.menuOpen = false;
            document.documentElement.classList.remove('open-menu');
        } 
    };
};

/**
 * chehcks media
 */
InitScriptsView.prototype.checkMedia = function() {
  const self = this;
  
  let mobile = window.matchMedia('(min-width: 320px) and (max-width: 599px)');
  let tablet = window.matchMedia('(min-width: 600px) and (max-width: 1279px)');
  
  if (mobile.matches) {
      self.resType = 'mobile';
  } else if (tablet.matches) {
      self.resType = 'tablet';        
  } else {
      self.resType = 'desktop';
  }
  
  console.log(self.resType);
};
 
/**
 * removes ads from zzz hosting
 */
InitScriptsView.prototype.hostingAdBlock = function() {
    var style = document.createElement('style');
    style.innerHTML = 'html body>div:first-child, html body>div:nth-child(2), html body>div:nth-child(2) script, html body div.cbalink, html body div.cumf_bt_form_wrapper { display: none!important; height: 0!important; }';
    document.head.appendChild(style);
};