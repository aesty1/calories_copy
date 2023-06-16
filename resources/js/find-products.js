import ApiService from "./api-service";
const search_panel = document.querySelector(".modal_seacrh_panel");
const add_button = document.querySelector(".modal_add_button");
var Api = new ApiService;
Api.deletesomething("products", 37);
// Api.createsomething("products", "oreh", 50, 100, 10, 500);
// Api.getSomething("products","user_products", 0).then((res) => console.log(res));
