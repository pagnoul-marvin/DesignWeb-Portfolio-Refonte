import {settings} from "./settings.js";

const portfolio = {

    init() {
        this.addEventListeners();
        this.noJs();
    },

    addEventListeners() {
        window.addEventListener('scroll', () => {
            this.changeWidthOfProgressBarElement();
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
}

portfolio.init();