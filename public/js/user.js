let nameOld = "";
let emailOld = "";
window.onload = function () {

    const sub = document.getElementById("submit")
    const cha = document.getElementById("change")
    const del = document.getElementById("delete")
    const nameEl = document.getElementById("name")
    const emailEl = document.getElementById("email")
    if (cha != null) {
        cha.onclick = changePassword
    }
    if (sub != null) {
        sub.onclick = submitChanges
    }
    if (del != null) {
        del.onclick = deleteAccount
    }
    if (nameEl != null) {
        nameOld = nameEl.value
    }
    if (emailEl != null) {
        emailOld = emailEl.value
    }
}

function changePassword() {
    const oldPswd = document.getElementById("oldPswd")
    const form = document.getElementById("changeForm")
    const message = document.getElementById("message")

    const newPswd = document.getElementById("newPswd")
    const newPswdRpt = document.getElementById("newPswdRpt")

    const bigLetter = new RegExp("[A-Z]")
    const number = new RegExp("[0-9]")
    if (oldPswd.value === "") {
        message.innerText = "Please fill in the old password!"
        return
    }
    if (newPswd.value === "") {
        message.innerText = "Please fill in the new password!"
        return
    }
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
    if (confirm("Are you sure you want to change the password?")) {
        form.submit()
    }
}

function submitChanges() {
    const name = document.getElementById("name")
    const email = document.getElementById("email")
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
    if (name.value === nameOld && email.value === emailOld) {
        message.innerText = "Nothing changed!"
        return
    }
    if (!email.checkValidity()) {
        message.innerText = "Email is not valid"
        return
    }
    if (confirm("Are you sure you want to save theese changes?")) {
        form.submit()
    }
}

function deleteAccount() {
    if (confirm("Are you sure you want to delete your account?")) {
        window.location.replace("?c=user&a=delete");
    }
}