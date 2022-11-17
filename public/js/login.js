window.onload = function () {
    setLoginText()

    const sub = document.getElementById("submit")
    if (sub != null) {
        sub.onclick = validateAndSend
    }

    const chng = document.getElementById("changeBtn")
    if (chng != null) {
        chng.onclick = changeLogin
    }
}

let login = true

function setLoginText() {
    const lgnTxt = document.getElementById("loginText")
    const heading = document.getElementById("lgnFromH")
    if (lgnTxt == null) {
        return
    }
    if (heading == null) {
        return
    }
    if (login) {
        lgnTxt.innerHTML = "Don't have an account " +
            "<button id=\"changeBtn\" class=\"btn signup\">create</button>" +
            " one"
        heading.innerText = "Login to customize crafting recipes!"
    } else {
        lgnTxt.innerHTML = "Already have an account " +
            "<button id=\"changeBtn\" class=\"btn signup\">log in</button>"
        heading.innerText = "Create an account to customize crafting recipes!"
    }
}

function changeLogin() {
    const boxes = document.querySelectorAll('.register')
    const btn = document.getElementById("submit")

    if (login) {
        login = false
        boxes.forEach(box => {
            box.style.display = "flex"
        });

        btn.innerText = "Register"
    } else {
        login = true
        boxes.forEach(box => {
            box.style.display = "none"
        });

        btn.innerText = "Login"
    }

    changeRequired(!login)
    setLoginText()

    document.getElementById("changeBtn").onclick = changeLogin
}

function changeRequired(to) {
    const email = document.getElementById("email")
    const repEmail = document.getElementById("repEmail")
    const repPwd = document.getElementById("repPwd")
    email.required = to
    repEmail.required = to
    repPwd.required = to
}

function validateAndSend() {
    const name = document.getElementById("name")
    const message = document.getElementById("message")
    const loginForm = document.getElementById("loginForm")
    console.log(name.value)
    if (!login) {
        const email = document.getElementById("email")
        const repEmail = document.getElementById("repEmail")
        if (email.value !== repEmail.value) {
            message.innerText = "Emails are not the same"
            return
        }
        const pwd = document.getElementById("pwd")
        const bigLetter = new RegExp("[A-Z]")
        const number = new RegExp("[1-9]")
        if (!(number.test(pwd.value) && bigLetter.test(pwd.value))) {
            message.innerText = "Password must contain at least one uppercase letter and one number"
            return
        }
        const repPwd = document.getElementById("repPwd")
        if (pwd.value !== repPwd.value) {
            message.innerText = "Passwords do not match"
            return
        }
        message.innerText = ""
        loginForm.submit()
    } else {
        message.innerText = ""
        loginForm.submit()
    }

}