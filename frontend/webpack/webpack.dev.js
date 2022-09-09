const webpack = require('webpack');
const merge = require('webpack-merge');
const config = require('./webpack.config.js');

module.exports = merge(config, {
  stats: { children: false },
  devtool: 'inline-source-map',
  devServer: {
    contentBase: './dist',
    host: 'localhost', // 默认是localhost
    hot: true, // 开启热更新
    port: 9527, // 端口
    historyApiFallback: true,
    compress: true, // 启用gzip 压缩
    proxy: {
      '/api': {
        target: 'http://testapi.whyd888.com',
        changeOrigin: true,
        secure: false,
        pathRewrite: { '^/api': '' }
      }
    }
  },
  plugins: [
    new webpack.NamedModulesPlugin(),
    // 热替换，热替换不是刷新
    new webpack.HotModuleReplacementPlugin()
  ]
});
