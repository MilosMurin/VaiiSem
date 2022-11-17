window.onload = function () {

    const sub = document.getElementById("submit")
    const del = document.getElementById("delete")
    if (sub != null) {
        sub.onclick = submitChanges
    }

    if (del != null) {
        del.onclick = deleteAccount
    }
}

function submitChanges() {

}

function deleteAccount() {
    window.location.replace("?c=user&a=delete");
}