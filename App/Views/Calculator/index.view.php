<form>
    <div class="row mb-3 mt-4 mx-auto w-50">
        <label for="profile" class="col-sm form-label">Choose a profile:</label>

        <select name="profile" id="profile" class="col-sm">
            <option value="Vanilla">Vanilla minecraft</option>
            <option value="GTNH">Gregtech New Horizons</option>
            <option value="PO3">Project Ozone 3</option>
            <option value="FTBIE">FTB Infinity Evolved</option>
        </select>

    </div>
    <div class="row mb-3 mt-4 mx-auto w-50">
        <label for="version" class="col-sm form-label">Choose version:</label>

        <select name="version" id="version" class="col-sm">
            <option value="1.19">1.19</option>
            <option value="1.18">1.18</option>
            <option value="1.17">1.17</option>
            <option value="1.16">1.16</option>
        </select>

    </div>
    <div class="row mb-3 mt-4 mx-auto w-50">
        <label for="item" class="col-sm form-label">Choose item:</label>

        <select name="item" id="item" class="col-sm">
            <option value="stick">Stick</option>
            <option value="crafting table">Crafting table</option>
            <option value="furnace">Furnace</option>
            <option value="brewing stand">Brewing stand</option>
        </select>

    </div>
    <div class="row mb-3 mt-4 mx-auto w-50">
        <label for="amount" class="col-sm form-label">Enter amount:</label>

        <input class="col-sm" type="number" id="amount" name="amount" placeholder="Amount">

    </div>
    <div class="row mb-3 mt-4 mx-auto w-50 d-flex align-items-center justify-content-center">
        <button type="submit" class="btn btn-primary col-2">Calculate</button>
    </div>
</form>