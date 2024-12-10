// import FruitController
const { index, store, update, destroy} = require("./FruitController.js");

// membuat fungsi main
const main = () => {
  console.log("Menampilkan Buah ");
  index();

  console.log("\nMenambahkan pisang ");
  store("Pisang");

  console.log("\nUpdate data 0 menjadi kelapa ");
  update(0, "Kelapa");


  console.log("\nMengahapus data 0 ");
  destroy(0);

}

main();
