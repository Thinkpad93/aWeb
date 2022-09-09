const merge = require('webpack-merge');
const common = require('./webpack.config.js');
// 打包之前清除文件
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = merge(common, {
  mode: 'production',
  devtool: 'none',
  plugins: [
    new CleanWebpackPlugin({
      verbose: false, // 开启在控制台输出信息
      dry: false
    }),
    new OptimizeCssAssetsPlugin(),
    new MiniCssExtractPlugin({
      filename: 'css/[name].[contenthash].css'
    })
  ]
});
