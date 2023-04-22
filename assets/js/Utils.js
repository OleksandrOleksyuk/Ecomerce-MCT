export default class Utils {
  constructor() {
    console.log("Utils");
    this.publicUrl = location.hostname;
    this.viewsPath =
      location.origin +
      (location.pathname.includes("/mct/") ? "/mct" : "") +
      "/wp-content/themes/merceriacreativatania/views/";
    this.mainPath =
      location.origin + (location.pathname.includes("/mct/") ? "/mct" : "");
    this.childMainPath =
      location.origin +
      (location.pathname.includes("/mct/") ? "/mct" : "") +
      "/wp-content/themes/merceriacreativatania/";
    this.assetsPath =
      location.origin +
      (location.pathname.includes("/mct/") ? "/mct" : "") +
      "/wp-content/themes/merceriacreativatania/assets/";
  }
}
