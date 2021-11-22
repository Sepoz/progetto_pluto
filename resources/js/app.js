require("bootstrap");
import Dropzone from "dropzone";

// setup dropzone.js
document.Dropzone = require("dropzone");
Dropzone.autoDiscover = false;

require("./announcementImages");

import Glide from "@glidejs/glide";
new Glide(".glide").mount();