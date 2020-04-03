const path = require("path");
const webpack = require("webpack");
// html插件
const HtmlWebpackPlugin = require("html-webpack-plugin");
// 压缩CSS插件
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  mode: "production",
  devtool: "none",
  entry: {
    main: "./src/index.js"
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        //排除node_modules 目录下的文件
        exclude: /node_modules/,
        use: [
          {
            loader: "babel-loader",
            options: {
              //因为新版本的babel更新 原配置修改如下
              presets: ["@babel/preset-env"],
              plugins: ["@babel/plugin-transform-runtime"]
            }
          }
        ]
      },
      {
        test: /\.(css|scss|sass)$/,
        use: [
          //{
            //loader: MiniCssExtractPlugin.loader,
            //options: {
              //esModule: true,
              //publicPath: "../",
              //hmr: process.env.NODE_ENV === "development"
            //}
          //},
          "style-loader",
          "css-loader",
          "postcss-loader"
        ]
      }
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      title: "",
      template: __dirname + `/src/index.html`,
      filename: "index.html",
      minify: false,
      hash: false
    }),
    new MiniCssExtractPlugin({
      filename: "[name].css"
    })
  ]
};
