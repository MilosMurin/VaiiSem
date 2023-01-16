window.onload = function () {

    let cubes = document.getElementsByClassName("click-learn")

    for (const cube of cubes) {
        cube.addEventListener("click", onClickedCube)
    }

}

const onClickedCube = e => {
    let back = e.currentTarget.parentElement.parentElement
    let bgColor = back.style.backgroundColor
    if (bgColor === "") {
        back.style.backgroundColor = "yellow"
    } else if (bgColor === "yellow") {
        back.style.backgroundColor = "lime"
    } else if (bgColor === "lime") {
        back.style.backgroundColor = ""
    }
}