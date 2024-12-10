// import data fruits
const fruits = require("./data.js");

// membuat fungsi index
const index = () => {
  for (const fruit of fruits) {
    console.log(fruit);
  }
};

// membuat fungsi store
const store = (name) => {
  fruits.push(name);
  index();
};

// membuat fungsi update
const update = (position, name) => {
  fruits[position] = name;
  index();
};

// membuat fungsi destroy
const destroy = (position) =>{
  fruits.splice(position, 1);
  index();
}

// export method index, store, update dan destroy
module.exports ={index, store, update, destroy};
