// var 声明
function getClothing(isCold) {
  if (isCold) {
    var freezing = "Grab a jacket!";
  } else {
    var hot = "It a shorts kind of day.";
    console.log(freezing);
  }
}

// let 声明
function getClothing(isCold) {
  if (isCold) {
    let freezing = "Grab a jacket!";
  } else {
    let hot = "It a shorts kind of day.";
    console.log(freezing);
  }
}

const student = {
  name: "Richard Kalchoff",
  guardian: "Mr. Kalchoff",
};

const teacher = {
  name: "Mrs. Wilson",
  room: "N231",
};

let message = `${student.name} please see ${teacher.name} in ${teacher.room} to pick up your report card.`;
