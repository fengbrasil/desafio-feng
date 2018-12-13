var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
define(["require", "exports", "vue"], function (require, exports, vue_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    vue_1 = __importDefault(vue_1);
    vue_1.default.filter('dateNormalize', function (value) {
        var date = new Date(value);
        var addzero = function (num) { return (num < 10) ? "0" + num : "" + num; };
        var dia = addzero(date.getDate()), mes = addzero(date.getMonth() + 1), ano = addzero(date.getFullYear());
        var hora = addzero(date.getHours()), minuto = addzero(date.getMinutes());
        return dia + "/" + mes + "/" + ano + " " + hora + ":" + minuto;
    });
    vue_1.default.filter('priceNormalize', function (value) { return "R$ " + parseFloat(value).toFixed(2).replace('.', ','); });
    vue_1.default.filter('idNormalize', function (value) { while (value.length < 3)
        value = '0' + value; return '#' + value; });
});
