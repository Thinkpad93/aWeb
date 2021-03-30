const webpack = require('webpack');
const merge = require('webpack-merge');
const config = require('./webpack.config.js');

module.exports = merge(config, {
  stats: { children: false },
  devtool: 'none',
  devServer: {
    contentBase: './dist',
    host: 'localhost', // 默认是localhost
    hot: true, // 开启热更新
    port: 1993, // 端口
    historyApiFallback: true,
    compress: true, // 启用gzip 压缩
    proxy: {
      '/api': {
        target: 'http://beta.cdsfl8888.com', // http://beta.whddd666.com
        changeOrigin: true,
        secure: false,
        pathRewrite: { '^/api': '' }
      }
    }
  },
  plugins: [
    new webpack.NamedModulesPlugin(),
    // 热替换，热替换不是刷新
    new webpack.HotModuleReplacementPlugin(),
  ],
});
