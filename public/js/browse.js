window.onload = function () {

    let cubes = document.getElementsByClassName("click-learn")

    for (const cube of cubes) {
        cube.addEventListener("click", onClickedCube)
    }

}

const onClickedCube = e => {
    let back = e.currentTarget.parentElement.parentElement


    let bgColor = back.style.backgroundColor
    let learnId = 0
    if (bgColor === "") {
        back.style.backgroundColor = "yellow"
        learnId = 1
    } else if (bgColor === "yellow") {
        back.style.backgroundColor = "lime"
        learnId = 2
    } else if (bgColor === "lime") {
        back.style.backgroundColor = ""
    }
    sendUdateId(e.currentTarget.id + learnId)
}

function sendUdateId(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "?c=browser&a=updateLearning&id=" + id, true);
    xhttp.send();
}