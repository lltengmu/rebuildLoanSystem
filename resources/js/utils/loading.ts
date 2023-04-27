class Loading {
    private status = true;
    private el = document.querySelector(`#preloader`) as HTMLDivElement;
    public open() {
        const option = { display: "block", zIndex: "999" }
        Object.assign(this.el.style, option);
    }
    public close(){
        const option = { display: "none", zIndex: "-1" }
        Object.assign(this.el.style, option);
    }
}

export default new Loading();