let sites: string[] = new Array("Google", "Runoob", "Taobao", "Fackbook");

function disps(arr_sites: string[]) {
  for (let i = 0; i < arr_sites.length; i++) {
    console.log(arr_sites[i]);
  }
}

disps(sites);

//类数组
function sums() {
  let args: IArguments = arguments;
}
