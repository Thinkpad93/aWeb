(function (root, factory) {
  root.Vue = factory();
})(this, function () {
  var Vue = function (options) {
    this.$options = options || {};
    var data = (this._data = options.data);
    var _this = this;
    Object.keys(data).forEach(function (key) {
      _this._proxy(key);
    });
  };
  Vue.prototype._proxy = function (key) {
    Object.defineProperty(this, key, {
      get: function () {
        return this._data[key];
      },
      set: function (newVal) {
        this._data[key] = newVal;
      },
    });
  };
  return Vue;
});
