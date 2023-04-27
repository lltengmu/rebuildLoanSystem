import { TweenLite } from "gsap";

export default (targetElement,targetNumber) => {
    let beforeNumber = Number(document.querySelector(targetElement).innerHTML)
    let number = { score: beforeNumber }
    let showResponse = document.querySelector(targetElement)
    //创建一个tween在1秒内改变score的属性值从0到100.
    let tween = TweenLite.to(number, 1, {
        score: targetNumber,
        onUpdate: showScore
    })
    function showScore() {
        showResponse.innerHTML = Number(number.score).toFixed(0);
    }
}