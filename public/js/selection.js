const onSelectAlgorithm = e => {
    unselect()
    e.style.backgroundColor = "lime"
    sendUdateId(e.id)
}

function unselect() {
    let selections = document.getElementsByClassName("selection")

    for (const selection of selections) {
        selection.style.backgroundColor = ""
    }
}

function sendUdateId(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "?c=browser&a=update&id=" + id, true);
    xhttp.send();
}