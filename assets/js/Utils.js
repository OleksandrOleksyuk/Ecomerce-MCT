export default class Utils {
  constructor() {
    console.log("Utils");
    this.publicUrl = location.hostname;
    this.viewsPath =
      location.origin + (location.pathname.includes("/mct/") ? "/mct" : "") + "/wp-content/themes/merceriacreativatania/views/";
    this.mainPath = location.origin + (location.pathname.includes("/mct/") ? "/mct" : "");
    this.childMainPath =
      location.origin + (location.pathname.includes("/mct/") ? "/mct" : "") + "/wp-content/themes/merceriacreativatania/";
    this.assetsPath =
      location.origin + (location.pathname.includes("/mct/") ? "/mct" : "") + "/wp-content/themes/merceriacreativatania/assets/";
  }

  // FormToJson(formContainer) {
  //   let context = this;
  //   let dataForm = formContainer.serializeArray();

  //   let dataFormFinalParams = {};
  //   $.each(dataForm, function (k, value) {
  //     if (typeof dataFormFinalParams[value.name] !== "undefined") dataFormFinalParams[value.name] += "," + value.value;
  //     else dataFormFinalParams[value.name] = value.value;
  //   });

  //   return dataFormFinalParams;
  // }
  FormToJson(id) {
    const container = document.querySelector(`form#${id}`);
    const formData = new FormData(container);
    const dataFormFinalParams = {};

    for (const [name, value] of formData.entries()) {
      if (dataFormFinalParams[name] !== undefined) {
        dataFormFinalParams[name] += `,${value}`;
      } else {
        dataFormFinalParams[name] = value;
      }
    }

    return dataFormFinalParams;
  }
}
