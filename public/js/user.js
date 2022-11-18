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
    const name = document.getElementById("name")
    const email = document.getElementById("email")
    const oldPswd = document.getElementById("oldPswd")
    const form = document.getElementById("userForm")
    const message = document.getElementById("message")
    if (name.value === "") {
        message.innerText = "Name cannot be empty"
        return
    }
    if (email.value === "") {
        message.innerText = "Email cannot be empty"
        return
    }
    if (!email.checkValidity()) {
        message.innerText = "Email is not valid"
        return
    }
    if (oldPswd.value === "") {
        if (confirm("Are you sure you want to save theese changes?")) {
            form.submit()
        }
    } else {
        // Password change
        const newPswd = document.getElementById("newPswd")
        const newPswdRpt = document.getElementById("newPswdRpt")

        const bigLetter = new RegExp("[A-Z]")
        const number = new RegExp("[0-9]")
        if (!(number.test(newPswd.value) && bigLetter.test(newPswd.value))) {
            message.innerText = "New password must contain at least one uppercase letter and one number"
            return
        }
        if (oldPswd.value === newPswd.value) {
            message.innerText = "New password cannot be the same as old password!"
            return
        }
        if (newPswd.value !== newPswdRpt.value) {
            message.innerText = "Passwords do not match"
            return
        }
        form.submit()
    }
}

function deleteAccount() {
    if (confirm("Are you sure you want to delete your account?")) {
        window.location.replace("?c=user&a=delete");
    }
}