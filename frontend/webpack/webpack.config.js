const path = require('path');
const webpack = require('webpack');
// html插件
const HtmlWebpackPlugin = require('html-webpack-plugin');
// 压缩CSS插件
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: {
    app: './src/index.js'
  },
  output: {
    filename: 'js/[name].[hash].js',
    path: path.resolve(__dirname, 'dist')
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        // 排除node_modules 目录下的文件
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              // 因为新版本的babel更新 原配置修改如下
              presets: ['@babel/preset-env'],
              plugins: ['@babel/plugin-transform-runtime']
            }
          }
        ]
      },
      {
        test: /\.(css|scss|sass)$/,
        use: [
          // {
          //   loader: MiniCssExtractPlugin.loader,
          //   options: {
          //     esModule: true
          //   }
          // },
          'style-loader',
          'css-loader',
          'postcss-loader'
          // "sass-loader"
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              limit: 10000,
              esModule: false,
              name: '[name].[hash:7].[ext]',
              outputPath: 'images/'
            }
          }
        ]
      }
    ]
  },
  // 配置模块如何解析
  resolve: {
    extensions: ['.js', '.json'],
    alias: {
      '@': path.resolve(__dirname, './src')
    }
  },
  plugins: [
    new HtmlWebpackPlugin({
      title: '',
      template: __dirname + `/src/index.html`,
      filename: 'index.html',
      minify: {
        collapseWhitespace: true,
        removeComments: true,
        removeRedundantAttributes: true,
        removeScriptTypeAttributes: true,
        removeStyleLinkTypeAttributes: true,
        useShortDoctype: true
      },
      minify: false,
      hash: false
    })
  ]
};
