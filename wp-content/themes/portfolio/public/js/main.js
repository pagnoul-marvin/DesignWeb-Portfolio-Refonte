import {settings} from "./settings.js";

const portfolio = {

    pourcentage: 0,
    maxPourcentage: -200,
    minPourcentage: 0,

    init() {
        this.addEventListeners();
        this.noJs();
    },

    addEventListeners() {
        window.addEventListener('scroll', () => {
            this.changeWidthOfProgressBarElement();
        });

        settings.buttonElements.forEach(button => {
            button.addEventListener('click', (e) => {
                this.sliderAnimation(e);
            });
        });
    },

    noJs() {
        //settings.noJsBannerElement.classList.add(settings.noDisplayClass);
    },

    changeWidthOfProgressBarElement() {
        const winScroll = document.documentElement.scrollTop;
        const documentHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / documentHeight) * settings.multiplicationScrolled;
        settings.progressBarElement.style.width = `${scrolled}%`;
    },

    sliderAnimation(e) {
        if (e.currentTarget.id === settings.beforeID) {
            if (this.pourcentage === this.minPourcentage) {
                this.pourcentage = this.maxPourcentage;
            } else {
                this.pourcentage += settings.left;
            }
        } else if (e.currentTarget.id === settings.afterID) {
            if (this.pourcentage === this.maxPourcentage) {
                this.pourcentage = this.minPourcentage;
            } else {
                this.pourcentage -= settings.left;
            }
        }
        settings.slideshowElement.style.left = `${this.pourcentage}%`;
    }
}

portfolio.init();