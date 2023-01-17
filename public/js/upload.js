const pllNames = ["Aa", "Ab", "F", "Ga", "Gb", "Gc", "Gd", "Ja", "Jb", "Ra",
                  "Rb", "T", "E", "Na", "Nb", "V", "Y", "H", "Ua", "Ub", "Z"]

window.onload = function () {

    const algId = document.getElementById("algId")
    const type = document.getElementById("type")
    const size = document.getElementById("size")
    if (algId != null) {
        update()
    }
    if (type != null) {
        type.onchange = update
    }
    if (size != null) {
        size.onchange = update
    }
}

function update() {
    const algId = document.getElementById("algId") // the one to fill up
    const type = document.getElementById("type")
    const size = document.getElementById("size")
    let id = 0;
    let amount = 0;
    switch (size.value) {
        case "3x3":
            id = 0;
            break
        default:
            id += 0;
            break
    }

    switch (type.value) {
        case "PLL":
            id = 1;
            amount = 21;
            break;
        case "OLL":
            id += 22;
            amount = 57;
            break;
        case "VW":
            id += 79;
            amount = 0;
            break;
        default:
            id += 0;
            break;
    }
    algId.innerHTML = ""
    for (let i = 1; i <= amount; i++) {
        let opt = document.createElement("option");
        opt.value = (i + id - 1).toString();
        if (type.value === "PLL") {
            opt.innerHTML = pllNames[i - 1];
        } else {
            opt.innerHTML = (i).toString();
        }
        algId.append(opt)
    }
}
