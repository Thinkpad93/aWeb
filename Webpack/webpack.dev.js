const webpack = require('webpack');
const config = require('./webpack.config.js');

module.exports = merge(config, {
  devtool: 'inline-source-map',
  devServer: {
    contentBase: './dist',
    host: 'localhost', // 默认是localhost
    hot: true, // 开启热更新
    port: 1993, // 端口
    historyApiFallback: true,
    compress: true, // 启用gzip 压缩
  },
  plugins: [
    new webpack.NamedModulesPlugin(),
    // 热替换，热替换不是刷新
    new webpack.HotModuleReplacementPlugin(),
  ],
});
