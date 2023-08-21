export class FlashMessage {
    constructor() {
        this.closeBtnFlash = document.querySelector("#close-btn-flash")
        this.flashMessage = document.querySelector("#flash-message")
        this.event()
    }

    event() {
        this.closeBtnFlash.addEventListener("click", ()=>this.closeFlash())
    }

    closeFlash() {
        this.flashMessage.classList.add("hide")
    }
}