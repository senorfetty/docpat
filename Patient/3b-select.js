function select (cell, date, slot, specialty) {
  // (A) UPDATE SELECTED CELL
  let last = document.querySelector("#select .selected");
  if (last != null) { last.classList.remove("selected"); }
  cell.classList.add("selected");

  // (B) UPDATE CONFIRM FORM
  document.getElementById("cdate").value = date;
  document.getElementById("cslot").value = slot;
  document.getElementById("cspectialty").value = specialty;
  document.getElementById("cgo").disabled = false;
}