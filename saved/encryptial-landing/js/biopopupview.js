/**
 * @constructor 
 */
const BioPopupView = function() {
    this.isOpen = false;
};
 

/**
 * controls person info modal 
 */
BioPopupView.prototype.init = function() {
    const self = this;
    
    self.opening();
    self.closure();
};

/**
 * modal opening
 */
BioPopupView.prototype.opening = function() {
    const self = this;
    const hasBio = document.getElementsByClassName('has-bio');
    
    for (var i = 0; i < hasBio.length; i++) {
        hasBio[i].onclick = (function(i) {
            return function() {
                let person = this;
                console.log(person);
                self.render(person);
            }
        })(i);
    }
};

/**
 * modal closure
 */
BioPopupView.prototype.closure = function() {
    const self = this;
    const container = document.getElementsByClassName('modal-content')[0];
    const closeBtn = document.getElementById('close-modal');
  
    document.body.onmousedown = function(e) {
        if (self.isOpen && container != e.target && !container.contains(e.target)) {
            self.unrender();
        }
    };

    closeBtn.onclick = function() {
        self.unrender();
    };
};

/**
 * modal render
 * updating lazyloader
 */
BioPopupView.prototype.render = function(person) {
    const self = this;
    
    const overlay = document.getElementById('modal_overlay');
    const modal = document.getElementById('bio-modal');
    
    let mPhoto = modal.getElementsByClassName('photo')[0];
    let mName = modal.getElementsByClassName('person_name')[0];
    let mBio = modal.getElementsByClassName('bio')[0];
    let mExp = modal.getElementsByClassName('experience')[0];
    let aSrc = person.getElementsByClassName('photo')[0].getAttribute('src');
    let aName = person.getElementsByClassName('person_name')[0].innerText;
    let aBio = person.getElementsByClassName('bio')[0].innerHTML;
    let aExp = person.getElementsByClassName('experience')[0];

    mPhoto.setAttribute('src', aSrc);
    mName.innerText = aName;
    mBio.innerHTML = aBio;
    
    if (aExp !== undefined) {
        mExp.innerHTML = aExp.innerHTML;
        modal.classList.remove('no-exp');
    } else {
        modal.classList.add('no-exp');
    }
    
    overlay.style.display = 'flex';
    setTimeout(function() {
        self.isOpen = true;
        document.documentElement.classList.add('open-modal');
    }, 10);
    
    lazyLoadInstance.update();
};

/**
 * modal unrender
 */
BioPopupView.prototype.unrender = function() {
    const self = this;
    self.isOpen = false;
    
    const overlay = document.getElementById('modal_overlay');
    const modal = document.getElementById('bio-modal');
    
    let mPhoto = modal.getElementsByClassName('photo')[0];
    let mName = modal.getElementsByClassName('person_name')[0];
    let mBio = modal.getElementsByClassName('bio')[0];
    let mExp = modal.getElementsByClassName('experience')[0];
    
    document.documentElement.classList.remove('open-modal');
    setTimeout(function() {
        overlay.style.display = 'none';
        mPhoto.setAttribute('src', '');
        mName.innerText = '';
        mBio.innerHTML = '';
        mExp.innerHTML = '';
    }, 300);
      
};